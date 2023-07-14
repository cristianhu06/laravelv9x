<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;

class EmpleadoCounter extends Component

{
    public $count;

    public function mount()
    {
        $this->count = Empleado::count();
    }
    public function refreshCount()
{
    $this->count = Empleado::count();
}
    public function render()
    {
        return view('livewire.empleado-counter');
    }
}
