<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\CustomDate;

class FirstForm extends Component{

    use CustomDate;
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $country;
    public $currentData;
    # for dob
    public $year;
    public $month;
    public $day;
    
    public function mount($previousData,$currentData){
        if($previousData){
            $this->first_name = $previousData['first_name'];
            $this->last_name = $previousData['last_name'];
            $this->address = $previousData['address'];
            $this->city = $previousData['city'];
            $this->country = $previousData['country'];
            $dob = explode('-',$previousData['dob']);
            $this->year = $dob[0];
            $this->month = $dob[1];
            $this->day = $dob[2];
        }
        $this->currentData = $currentData;
    }
    
    public function next(){
        $data = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'day' => 'required|numeric',
        ]);
        $data['dob'] = $this->year.'-'.$this->month.'-'.$this->day;
        unset($data['year']);
        unset($data['month']);
        unset($data['day']);
        $this->dispatch('nextPage',$data,$this->currentData);
    }
    public function render(){
        return view('livewire.first-form');
    }
}
