<?php

namespace App\Admin;

use Livewire\WithPagination;

trait WithAdminDataTable
{
    use WithPagination;

    public object $obj;

    public $search = '';

    public $type;

    public function getModelProperty()
    {
        $obj = $this->obj->where('name', 'like', '%'.$this->search.'%');

        if ($this->type) {
            $obj->where('type', $this->type);
        }

        return $obj->paginate(20);
    }
}
