<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa; // Asegúrate de importar el modelo que necesitas

class EmployeeCounter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Empresa::count();
    }

    public function refreshCount()
{
    $this->count = Empresa::count();
}

    public function render()
    {
        return view('livewire.empresa-counter');
    }
}
