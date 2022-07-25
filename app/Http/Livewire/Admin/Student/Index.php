<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
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
        $students = Student::with('matters')->orderBy('id', 'desc');
        if($this->search):
            $students = $students->where('name', 'LIKE', "%{$this->search}%");
        endif;
        $students = $students->paginate($this->perPage);    
        return view('livewire.admin.student.index', compact('students'));
    }
    public function destroy(Student $matter){
        try{
            $matter->delete();
            $this->emit('alert', 'success', 'Eliminación con éxito');
        }catch(Exception $e){
            $this->emit('alert', 'error', 'Ocurrio un error en la eliminación: '.$e->getMessage());
        }
    }
}
