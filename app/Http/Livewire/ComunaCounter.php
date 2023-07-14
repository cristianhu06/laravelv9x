<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comuna;

class ComunaCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Comuna::count();
    }
    public function refreshCount()
    {
        $this->count = Comuna::count();
    }
    public function render()
    {
        return view('livewire.comuna-counter');
    }
}
