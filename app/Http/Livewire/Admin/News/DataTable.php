<?php

namespace App\Http\Livewire\Admin\News;

use App\Admin\WithAdminDataTable;
use App\Models\News;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'news';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'News';

    use WithAdminDataTable;

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = $this->getModelProperty();

        return view('livewire.admin.news.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            News::find($id)->delete();
        }
    }
}
