<?php

namespace App\Http\Livewire\Admin\Slide;

use App\Admin\WithAdminDataTable;
use App\Models\Slide;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'slide';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Slide';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.slide.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Slide::find($id)->delete();
        }
    }
}
