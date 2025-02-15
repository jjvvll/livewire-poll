<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
class CreatePoll extends Component
{
    public $title;
    public $options = [''];

    protected $rules =[
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:2|max:10',
        'options.*' => 'required|min:1|max:255'  //for every entry in the array
    ];


    protected $messages =[
        'options.min' => "There must be at least 3 options",
        'options.*' => "The option can't be empty",
    ];

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

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function createPoll(){

        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
            ->map(fn ($option) => ['name' => $option])
            ->all()
        );

        // foreach($this->options as $optionName){
        //     $poll->options()->create(['name'=> $optionName]);
        // }

        $this->reset(['title', 'options']);
    }

    public function mount(){
        //can be used to initialize the values of properties , will only be called once
        //for example reading something from database, you do that here
    }
}


//this is called a component
