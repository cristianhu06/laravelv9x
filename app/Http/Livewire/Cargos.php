<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cargo;

class Cargos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cargos.view', [
            'cargos' => Cargo::latest()
						->orWhere('nombre', 'LIKE', $keyWord)

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

    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        Cargo::create([
			'nombre' => $this->nombre

        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Cargo Creado Correctamente.');
    }

    public function edit($id)
    {
        $record = Cargo::findOrFail($id);
        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cargo::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre

            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Cargo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Cargo::where('id', $id)->delete();
        }
    }
}
