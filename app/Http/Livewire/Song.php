<?php

namespace App\Http\Livewire;

use App\Models\Song as SongModel;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class Song extends Component
{
    use WithPagination;

    public $filterType = [];

    public $filterTopic = [];
    public $pageName = "Songs";
    public $url = "songs";
    public $searchRecord = "";

    public function mount()
    {
        if (request()->get('type') != null) {
            $this->filterType[] = request()->get('type');
        }
    }

    public function render()
    {
        $query = SongModel::where('name', 'like', '%' . $this->searchRecord . '%');
        if (count($this->filterType) > 0) {
            $query->whereIn('type', $this->filterType);
        }
        if (count($this->filterTopic) > 0) {
            $query->whereHas('topics', function ($q) {
                $q->whereIn('slug', $this->filterTopic);
            });
        }
        $songs = $query->paginate(20);

        return view('livewire.song', [
            'items' => $songs,
            'topics' => Topic::all(),
        ])->layout('layouts.guest');
    }
}
