<?php

namespace App\Http\Livewire;

use App\Models\Partner as PartnerModel;
use Livewire\Component;
use Livewire\WithPagination;

class Partner extends Component
{
    use WithPagination;

    public $searchRecord = "";
    public $pageName = "Hội viên";
    public $url = "partners";


    public function render()
    {
        return view('livewire.partner', [
            'items' => PartnerModel::where('type', 'artist')->where('name', 'like', '%' . $this->searchRecord . '%')->paginate(20),
        ])->layout('layouts.guest');
    }
}
