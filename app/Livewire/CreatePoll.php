<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption(){
        $this->options[] ='';
    }

    public function removeOption($index){
        unset($this->options[$index]); //remove element
        $this->options = array_values($this->options) ; //make array continuous again
    }

    public function mount(){
        //can be used to initialize the values of properties , will only be called once
        //for example reading something from database, you do that here
    }
}


//this is called a component
