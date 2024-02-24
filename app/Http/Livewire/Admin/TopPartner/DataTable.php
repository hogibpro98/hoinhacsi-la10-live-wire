<?php

namespace App\Http\Livewire\Admin\TopPartner;

use App\Models\TopPartner;
use Livewire\Component;

class DataTable extends Component
{
    protected $items = [];

    public $that = 'top-partner';

    protected $listeners = [
        'confirmDelete',
    ];

    public $model = 'TopPartner';

    public function __construct()
    {
        $modelName = 'App\\Models\\'.$this->model;
        $this->obj = new $modelName();
    }

    public function render()
    {
        $this->items = TopPartner::orderBy('sequence')->get();

        return view('livewire.admin.top-partner.data-table', [
            'items' => $this->items,
        ]);
    }

    public function confirmDelete($id)
    {
        if ($id) {
            TopPartner::find($id)->delete();
        }
    }
}
