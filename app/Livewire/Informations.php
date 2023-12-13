<?php

namespace App\Livewire;

use Livewire\Component;

class Informations extends Component
{
    protected $listeners = [
        'nextPage' => 'nextPage',
        'previousPage' => 'previousPage',
        'submitPage' => 'submit'
    ];

    public $firstPage = true;
    public $secondPage = false;
    public $output = false;
    public $previousData;
    public $currentData;

    public function previousPage($data){
        $this->currentData = $data;
        $this->firstPage = true;
        $this->secondPage = false;
    }

    public function nextPage($previousData,$currentData){
        $this->previousData = $previousData;
        $this->currentData = $currentData;
        $this->firstPage = false;
        $this->secondPage = true;
    }

    public function submit($currentData){
        $this->currentData = $currentData;
        // now combine both previous and current data
        $inputs = array_merge($this->previousData,$this->currentData);
        $this->firstPage = false;
        $this->secondPage = false;
        $this->output = true;
    }

    public function resetAll(){
        $this->reset();
    }
    
    public function render(){
        return view('livewire.informations');
    }
}
