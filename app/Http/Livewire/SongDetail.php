<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class SongDetail extends Component
{
    public $slug;

    public $isLastSong = false;

    public $isFirstSong = true;

    public $settingControl = [
        'muted' => false,
        'isPlaying' => false,
        'loop' => false,
        'random' => false,
    ];

    public $playlistControl = [
        'duration' => 0,
        'listened' => [],
        'playList' => [],
        'currentSong' => [
            'index' => false,
            'info' => false,
        ],
        'isLastSong' => false,
        'isFisrtSong' => true,
    ];

    protected $listeners = [
        'updateCurrentVolume',
        'changeSong',
        'updateRealTimeSong',
        'updateRandomSetting',
        'updateLoopSetting',
    ];

    public function resetForm()
    {
        $this->playlistControl['currentTime'] = 0;
        $this->settingControl['isPlaying'] = false;
    }

    public function mount($slug)
    {
        $array = explode('/', $slug);
        $this->slug = end($array);
    }

    public function render()
    {
        $song = Song::where('slug', $this->slug)->first();
        if ($song) {

            $songsWithSameAlbums = Song::whereHas('albums', function ($query) use ($song) {
                $query->whereIn('album_id', $song->albums->pluck('id'));
            })->get();

            $this->playlistControl['listened'][] = $song->id;
            $songIdsToPrioritize = $this->playlistControl['listened'];

            $songsWithSameAlbums = $songsWithSameAlbums->sortBy(function ($song) use ($songIdsToPrioritize) {
                $priority = array_search($song->id, $songIdsToPrioritize);

                return $priority !== false ? $priority : PHP_INT_MAX;
            });
            $this->playlistControl['playList'] = $songsWithSameAlbums->values();

            if ($this->playlistControl['currentSong']['info']) {
                $data = Song::find($this->playlistControl['currentSong']['info']['id']);
                $this->playlistControl['currentSong']['info'] = $data;
                $this->playlistControl['currentSong']['info']['last_post'] = false;
            } else {
                $this->playlistControl['currentSong']['info'] = $song;
                $this->playlistControl['currentSong']['info']['last_post'] = false;
            }

        }

        return view('livewire.song-detail', [
            'song' => $song,
        ])->layout('layouts.guest');
    }

    public function updateCurrentVolume($value)
    {
        $this->settingControl['volume'] = $value;

    }

    public function updateRandomSetting()
    {
        $this->settingControl['random'] = ! $this->settingControl['random'];
        $this->emit('resultRandomSong', $this->settingControl['random']);
    }

    public function updateLoopSetting()
    {
        $this->settingControl['loop'] = ! $this->settingControl['loop'];
        $this->emit('resultLoopSong', $this->settingControl['loop']);
    }

    public function upViewSong($song)
    {
        if ($song) {
            $song->increment('view');
        }
    }

    public function clickListening($value)
    {
        $this->playlistControl['currentTime'] = 0;
        foreach ($this->playlistControl['playList'] as $key => $song) {
            if (! $this->settingControl['random']) {
                $this->playlistControl['listened'][] = $song['id'];
            }
            if ($song['id'] == $value) {
                if ($this->settingControl['random']) {
                    $this->playlistControl['listened'][] = $song['id'];
                }
                $this->playlistControl['currentSong']['index'] = $key;
                $this->playlistControl['currentSong']['info'] = $song;
                break;
            }
        }
        $this->isFirstSong = $this->playlistControl['currentSong']['index'] === 0;
        $this->isLastSong = (count($this->playlistControl['playList']) - 1) === $this->playlistControl['currentSong']['index'];
        $this->upViewSong(Song::find($this->playlistControl['currentSong']['info']['id']));
        $this->emit('resultCurrentSong', $this->playlistControl['currentSong']['info']);
    }

    public function changeSong($value)
    {
        if (! $this->settingControl['loop']) {
            $this->resetForm();

            if (! $this->settingControl['random']) {
                if ($value === 'next') {
                    $this->playlistControl['currentSong']['index'] = $this->playlistControl['currentSong']['index'] + 1;
                } else {
                    $this->playlistControl['currentSong']['index'] = $this->playlistControl['currentSong']['index'] - 1;
                }

                $this->playlistControl['currentSong']['info'] = $this->playlistControl['playList'][$this->playlistControl['currentSong']['index']];
            } else {
                $excludeIds = $this->playlistControl['listened'];
                $filteredPlaylist = array_filter($this->playlistControl['playList'], function ($song) use ($excludeIds) {
                    return ! in_array($song['id'], $excludeIds);
                });
                $this->playlistControl['currentSong']['info'] = $filteredPlaylist[array_rand($filteredPlaylist)];
            }

            $this->isFirstSong = $this->playlistControl['currentSong']['index'] === 0;
            $this->isLastSong = (count($this->playlistControl['playList']) - 1) === $this->playlistControl['currentSong']['index'];

            $this->playlistControl['listened'][] = $this->playlistControl['currentSong']['info']['id'];
        }
        $this->upViewSong(Song::find($this->playlistControl['currentSong']['info']['id']));
        $this->emit('resultCurrentSong', $this->playlistControl['currentSong']['info']);
    }

    public function likeSong()
    {
        $user = auth()->user();
        $song = Song::findOrFail($this->playlistControl['currentSong']['info']['id']);

        // Kiểm tra xem người dùng đã like bài hát chưa
        $isLiked = $song->likes()->where('user_id', $user->id)->exists();

        if ($isLiked) {
            // Nếu đã like, xóa like
            $song->likes()->detach($user->id);

            return response()->json(['message' => 'Song like removed']);
        } else {
            // Nếu chưa like, thêm like
            $song->likes()->attach($user->id);

            return response()->json(['message' => 'Song liked successfully']);
        }
    }
}
