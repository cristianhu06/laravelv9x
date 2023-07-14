<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paise;

class Paises extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $codigo;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paises.view', [
            'paises' => Paise::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('codigo', 'LIKE', $keyWord)
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
		$this->codigo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
        ]);

        Paise::create([ 
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Paise Successfully created.');
    }

    public function edit($id)
    {
        $record = Paise::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->codigo = $record-> codigo;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paise::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Paise Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Paise::where('id', $id)->delete();
        }
    }
}