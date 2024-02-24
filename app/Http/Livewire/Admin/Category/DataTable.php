<?php

namespace App\Http\Livewire\Admin\Category;

use App\Admin\WithAdminDataTable;
use App\Models\Category;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'category';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'Category';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.category.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Category::find($id)->delete();
        }
    }
}
