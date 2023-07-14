<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellidos, $telefono, $direccion, $cargo, $correo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellidos', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('cargo', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellidos = null;
		$this->telefono = null;
		$this->direccion = null;
		$this->cargo = null;
		$this->correo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'cargo' => 'required',
		'correo' => 'required',
        ]);

        Empleado::create([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'telefono' => $this-> telefono,
			'direccion' => $this-> direccion,
			'cargo' => $this-> cargo,
			'correo' => $this-> correo
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellidos = $record-> apellidos;
		$this->telefono = $record-> telefono;
		$this->direccion = $record-> direccion;
		$this->cargo = $record-> cargo;
		$this->correo = $record-> correo;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'direccion' => 'required',
		'cargo' => 'required',
		'correo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellidos' => $this-> apellidos,
			'telefono' => $this-> telefono,
			'direccion' => $this-> direccion,
			'cargo' => $this-> cargo,
			'correo' => $this-> correo
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Empleado::where('id', $id)->delete();
        }
    }
}