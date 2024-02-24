<?php

namespace App\Http\Livewire\Admin\Album;

use App\Admin\WithAdminDataTable;
use App\Models\Album;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'album';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Album';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Album::find($id)->delete();
        }
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.album.data-table', [
            'items' => $this->items,
        ]);
    }
}
