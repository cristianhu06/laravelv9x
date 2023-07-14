<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Regione;

class Regiones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $region;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.regiones.view', [
            'regiones' => Regione::latest()
						->orWhere('region', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->region = null;
    }

    public function store()
    {
        $this->validate([
		'region' => 'required',
        ]);

        Regione::create([ 
			'region' => $this-> region
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Regione Successfully created.');
    }

    public function edit($id)
    {
        $record = Regione::findOrFail($id);
        $this->selected_id = $id; 
		$this->region = $record-> region;
    }

    public function update()
    {
        $this->validate([
		'region' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Regione::find($this->selected_id);
            $record->update([ 
			'region' => $this-> region
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Regione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Regione::where('id', $id)->delete();
        }
    }
}