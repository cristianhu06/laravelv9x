<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Regione;
class RegionCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Regione::count();
    }
    public function refreshCount()
{
    $this->count = Regione::count();
}
    public function render()
    {
        return view('livewire.region-counter');
    }
}
