<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Paise;

class PaisCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Paise::count();
    }

    public function refreshCount()
{
    $this->count = Paise::count();
}
    public function render()
    {
        return view('livewire.pais-counter');
    }
}
