<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cargo;

class CargoCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Cargo::count();
    }
    public function refreshCount()
    {
        $this->count = Cargo::count();
    }

    public function render()
    {
        return view('livewire.cargo-counter');
    }
}
