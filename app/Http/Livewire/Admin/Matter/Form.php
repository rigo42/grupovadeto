<?php

namespace App\Http\Livewire\Admin\Matter;

use App\Models\Matter;
use App\Models\Student;
use Livewire\Component;

class Form extends Component
{
    public $matter;
    public $method;
    public $matterStudentsArray = [];

    protected function rules(){
        return [
            'matter.name' => 'required',
        ];
    }
    public function mount(Matter $matter, $method){
        $this->matter = $matter;
        $this->method = $method; 
        $this->matterStudentsArray = $this->matter->students()->pluck('student_id')->toArray();
    }
    public function render(){
        $students = Student::orderBy('id', 'desc')->cursor();
        return view('livewire.admin.matter.form', compact('students'));
    }
    public function hydrate(){
        $this->emit('renderJs');
    }
    public function store(){
        $this->validate();
        $this->matter->save();
        $this->saveStudents();
        $this->matter = new Matter();
        $this->reset('matterStudentsArray');
        $this->emit('alert', 'success', 'Creación con éxito');
        $this->emit('render');
    }
    public function update(){
        $this->validate();
        $this->matter->update();
        $this->saveStudents();
        $this->emit('alert', 'success', 'Actualización con éxito');
        $this->emit('render');
    }
    public function saveStudents(){
        $this->matter->students()->sync($this->matterStudentsArray);
    }
}
