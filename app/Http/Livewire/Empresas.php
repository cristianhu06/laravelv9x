<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;

class Empresas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $direccion, $telefono, $correo, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresas.view', [
            'empresas' => Empresa::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->direccion = null;
		$this->telefono = null;
		$this->correo = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'descripcion' => '',
        ]);

        Empresa::create([
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'descripcion' => $this-> descripcion
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Empresa Successfully created.');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->correo = $record-> correo;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
		'descripcion' => '',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'correo' => $this-> correo,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Empresa Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Empresa::where('id', $id)->delete();
        }
    }
}
