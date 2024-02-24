<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\Partner;
use App\Models\News;
use App\Models\Tag;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ProfileDetail extends Component
{
    use WithPagination;

    const PANGINATE_NEW = 8;
    const PANGINATE_SONG = 10;
    const DEFAULT_IMAGE = 'images/gallery.svg';

    public $activeTab = 'story';
    public $slug;
    public $tabs = [
        'story' => [
            'name' => 'Tiểu sử',
            'icon' => null,
        ],
        'prizes' => [
            'name' => 'Giải thưởng',
            'icon' => null//'/img/icon/star.svg'
        ],
        'library' => [
            'name' => 'Thư viện nội dung',
            'icon' => null//'/img/icon/star.svg'
        ],
        'data' => [
            'name' => 'Tư liệu',
            'icon' => null,
        ],
    ];

    public function mount($id)
    {
        $this->slug = $id;
    }

    public function render()
    {
        $libraries = [];
        $news = [];
        $profile = [];

        $partner = Partner::where('slug_name', $this->slug)
            ->with(['song', 'featuredSong', 'instrumentalMusic'])
            ->first();

        if ($partner) {
                $partnerId = $partner->id;
                $profile = $this->getProfile($partner);
                $libraries = $this->getSongWithPaginate($partnerId);
                $news = $this->getNewWithPaginate($this->slug);
        }

        return view('livewire.profile-detail',
            [
                'profile' => $profile,
                'libraries' => $libraries,
                'news' => $news
            ]
        )->layout('layouts.guest');
    }

    public function getProfile($partner = null) {
        if ($partner) {
            return [
                "name" => $partner->name,
                "public_name" => null,
                "position" => $partner->position,
                "categories" => [],
                "fb_link" => $partner->fb_link,
                "yt_link" => $partner->yt_link,
                "tiktok_link" => $partner->tiktok_link,
                "spotify_link" => $partner->spotify_link,
                "zing_mp3_link" => $partner->zing_mp3_link,
                "featured_works" => $partner->featuredSong->count(),
                "musical_instruments" => $partner->instrumentalMusic->count(),
                "prizes" => $partner->prize,
                "opera" => 0,
                "story" => $partner->story,
                "avatar" => self::getMediaModel($partner),
                "status" => "active"
            ];
        }
        return config('app.dataUser')[request()->route('id')] ?? null;
    }

    public function getNewWithPaginate($slug = null)
    {
        $tags = Tag::where('slug', $slug)
            ->pluck('id')
            ->toArray();
        if ($tags) {
            $paginated = News::whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('news_tags.tag_id', $tags);
            })->paginate(self::PANGINATE_NEW, ['*'], 'newsPage');

            if (count($paginated)) {
                $modified = $paginated->map(function ($new) {
                    $new->title = $new->name;
                    $new->content = $new->short_description;
                    $new->date = self::formatDateVietnamese($new->date_public);
                    $new->img = self::getMediaModel($new);

                    return $new;
                });
                $paginated->items($modified->all());

                return $paginated;
            }
        }

        return [];
    }

    public function getSongWithPaginate($id = null, $partnerName = null)
    {
        $paginatedSongs = Song::whereHas('artists', function ($query) use ($id) {
            $query->where('song_artists.partner_id', $id);
        })->paginate(self::PANGINATE_SONG, ['*'], 'librariesPage');

        if ($paginatedSongs) {
            $modifiedSongs = $paginatedSongs->map(function ($song) use($partnerName) {
                $song->singer = $partnerName;
                $song->img = self::getMediaModel($song);
                $song->state = 'Công khai';
                $song->license = null;
                $song->publish_date = $song->year_create;
                $song->views = $song->view;
                $song->comments = 0;
                $song->update_date = self::formatDateVietnamese($song->updated_at);

                return $song;
            });
            $paginatedSongs->items($modifiedSongs->all());

            return $paginatedSongs;
        }

        return [];
    }

    public function formatDateVietnamese($date)
    {
        $carbonDate = Carbon::parse($date);
        return $carbonDate->format('d/m/Y');
    }

    public function getMediaModel($model)
    {
        if ($model->getMedia('media')->where('model_id', $model->id)->isNotEmpty()) {
            return $model->getMedia('media')->firstWhere('model_id', $model->id)->getUrl();
        }
        return self::DEFAULT_IMAGE;
    }

    public function paginationView()
    {
        return 'guest.pagination';
    }
}
