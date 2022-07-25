<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Matter;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Form extends Component
{
    public $student;
    public $method;
    public $imageTmp;
    public $studentMattersArray = [];

    protected function rules(){
        return [
            'student.name' => 'required',
            'student.surname' => 'required',
            'student.date_birthday' => 'required',
            'imageTmp' => 'nullable|image',
        ];
    }
    public function mount(Student $student, $method){
        $this->student = $student;
        $this->method = $method; 
        $this->studentMattersArray = $this->student->matters()->pluck('matter_id')->toArray();
    }
    public function render(){
        $matters = Matter::orderBy('id', 'desc')->cursor();
        return view('livewire.admin.student.form', compact('matters'));
    }
    public function hydrate(){
        $this->emit('renderJs');
    }
    public function store(){
        $this->validate();
        $this->student->save();
        $this->saveMatters();
        $this->student = new Student();
        $this->reset('studentMattersArray', 'imageTmp');
        $this->emit('alert', 'success', 'Creación con éxito');
        $this->emit('render');
    }
    public function update(){
        $this->validate();
        $this->student->update();
        $this->saveMatters();
        $this->emit('alert', 'success', 'Actualización con éxito');
        $this->emit('render');
    }    
    public function saveMatters(){
        $this->student->matters()->sync($this->studentMattersArray);
    }
    public function saveImage(){
        if($this->imageTmp):
            $url = $this->imageTmp->store('public/student');
            imageManager($url, 300, $this->student);
        endif;
    }
    public function removeImage(){
        if($this->student->image):
            if(Storage::exists($this->student->image->url)):
                Storage::delete($this->student->image->url);
            endif;
            $this->student->image()->delete();
            $this->student->image = null;
        endif;
        $this->reset('imageTmp');
        $this->emit('alert', 'success', 'Imagen eliminada con éxito');
    }
}
