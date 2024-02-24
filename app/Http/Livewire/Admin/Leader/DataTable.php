<?php

namespace App\Http\Livewire\Admin\Leader;

use App\Admin\WithAdminDataTable;
use App\Models\Leader;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'leader';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Leader';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.leader.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Leader::find($id)->delete();
        }
    }
}
