<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Admin\WithAdminDataTable;
use App\Models\Tag;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'tag';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Tag';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.tag.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Tag::find($id)->delete();
        }
    }
}
