<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Sidebar extends Component
{
    public $selected = null;

    public $childSelected = null;

    public function render()
    {
        return view('livewire.admin.sidebar');
    }
}
