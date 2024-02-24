<?php

namespace App\Http\Livewire\Admin\Song;

use App\Admin\WithAdminDataTable;
use App\Models\Song;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'song';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Song';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.song.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Song::find($id)->delete();
        }
    }
}
