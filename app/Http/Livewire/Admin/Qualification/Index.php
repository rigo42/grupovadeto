<?php

namespace App\Http\Livewire\Admin\Qualification;

use App\Models\Matter;
use App\Models\MatterStudent;
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
        $qualifications = MatterStudent::with(['matter', 'student'])->orderBy('id', 'desc');
        if($this->search):
            $qualifications = $qualifications->whereHas('matter', function($query){
                $query->where('name', 'LIKE', "%{$this->search}%");
            })
            ->orWhereHas('student', function($query){
                $query->where('name', 'LIKE', "%{$this->search}%")
                ->orWhere('surname', 'LIKE', "%{$this->search}%");
            });
        endif;
        $qualifications = $qualifications->paginate($this->perPage);    
        return view('livewire.admin.qualification.index', compact('qualifications'));
    }
    public function destroy(MatterStudent $qualification){
        try{
            $qualification->delete();
            $this->emit('alert', 'success', 'Eliminación con éxito');
        }catch(Exception $e){
            $this->emit('alert', 'error', 'Ocurrio un error en la eliminación: '.$e->getMessage());
        }
    }
}
