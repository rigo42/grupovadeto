<?php

namespace App\Http\Livewire\Admin\Matter;

use App\Models\Matter;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 20;
    public $search;
    protected $queryString = ['search' => ['except' => '']];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render'];

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render(){
        $matters = Matter::with('students.image')->orderBy('id', 'desc');
        if($this->search):
            $matters = $matters->where('name', 'LIKE', "%{$this->search}%");
        endif;
        $matters = $matters->paginate($this->perPage);    
        return view('livewire.admin.matter.index', compact('matters'));
    }
    public function destroy(Matter $matter){
        try{
            $matter->delete();
            $this->emit('alert', 'success', 'Eliminación con éxito');
        }catch(Exception $e){
            $this->emit('alert', 'error', 'Ocurrio un error en la eliminación: '.$e->getMessage());
        }
    }
}
