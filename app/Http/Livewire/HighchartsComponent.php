<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HighchartsComponent extends Component
{
    public $chartData;

    public $chartId;

    public function render()
    {
        return view('livewire.highcharts-component');
    }
}
