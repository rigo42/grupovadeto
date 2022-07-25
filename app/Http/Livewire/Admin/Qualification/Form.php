<?php

namespace App\Http\Livewire\Admin\Qualification;

use App\Models\MatterStudent;
use Livewire\Component;

class Form extends Component
{
    public $qualification;
    public $method;

    protected function rules(){
        return [
            'qualification.qualification' => 'required'
        ];
    }
    public function mount(MatterStudent $qualification, $method){
        $this->qualification = $qualification;
        $this->method = $method;
    }
    public function render(){
        return view('livewire.admin.qualification.form');
    }
    public function update(){
        $this->validate();
        $this->qualification->update();
        $this->emit('alert', 'success', 'Actualización con éxito');
        $this->emit('render');
    }
}
