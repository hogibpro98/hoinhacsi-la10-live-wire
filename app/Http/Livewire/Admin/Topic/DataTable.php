<?php

namespace App\Http\Livewire\Admin\Topic;

use App\Admin\WithAdminDataTable;
use App\Models\Topic;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'topic';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Topic';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.topic.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Topic::find($id)->delete();
        }
    }
}
