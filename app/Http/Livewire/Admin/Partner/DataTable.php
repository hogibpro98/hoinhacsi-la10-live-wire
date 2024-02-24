<?php

namespace App\Http\Livewire\Admin\Partner;

use App\Admin\WithAdminDataTable;
use App\Models\Partner;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'partner';

    public $thatUp = 'Partner';

    public $model = 'Partner';

    use WithAdminDataTable;

    protected $listeners = [
        'confirmDelete',
    ];

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        if (! $this->type) {
            $route = Route::current();
            $routeName = $route->getName();
            $this->type = explode('.', $routeName)[2];
            $this->that = 'partner.'.$this->type;
        }
        $this->items = $this->getModelProperty();

        return view('livewire.admin.partner.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            Partner::find($id)->delete();
        }
    }
}
