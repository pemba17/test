<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Traits\CustomDate;

class SecondForm extends Component
{
    use CustomDate;
    public $previousData;
    public $ageValidated = false;
    public $married;
    public $country_marriage;
    public $widowed;
    public $married_past;

    # for date
    public $year;
    public $month;
    public $day;

    public function mount($previousData,$currentData){
        if($currentData){
            $this->married = $currentData['married'];
            if($currentData['date_of_marriage']){
                $date_of_marriage = explode('-',$currentData['date_of_marriage']);
                $this->year = $date_of_marriage[0];
                $this->month = $date_of_marriage[1];
                $this->day = $date_of_marriage[2];
                
            }else $date_of_marriage = null;
            $this->country_marriage = $currentData['country_marriage'];
            $this->widowed = $currentData['widowed'];
            $this->married_past = $currentData['married_past'];
        }
        $this->previousData = $previousData;
        $this->checkAgeValidated();
    }

    public function checkAgeValidated(){
        # check with date of birth if age is 18 or over 18
        $birthDate = Carbon::parse($this->previousData['dob']);
        $age = $birthDate->age;
        if($age>=18) $this->ageValidated = true;
        else $this->ageValidated = false;
    }

    public function updatedMarried(){
        if($this->married=='yes') {
            $this->checkAgeValidated();
            // reset other value
            $this->reset(['widowed','married_past']);
        }else {
            $this->reset(['year','month','day','country_marriage']);
        }
    }

    public function previous(){
        $data = [
            'married' => $this->married,
            'country_marriage' => $this->country_marriage,
            'widowed' => $this->widowed,
            'married_past' => $this->married_past,
            'date_of_marriage' => ($this->year && $this->month && $this->day)?$this->year.'-'.$this->month.'-'.$this->day:null
        ];
        $this->dispatch('previousPage',$data);
    }

    public function save(){
        $data = $this->validate([
            'married'=>'required',
            'country_marriage' =>'nullable',
            'widowed' => 'nullable',
            'married_past'=> 'nullable',
            'year' => 'nullable|numeric',
            'month' => 'nullable|numeric',
            'day' => 'nullable|numeric',
        ]);
        $data['date_of_marriage'] = ($this->year && $this->month && $this->day)?$this->year.'-'.$this->month.'-'.$this->day:null;
        unset($data['year']);
        unset($data['month']);
        unset($data['day']);
        $this->dispatch('submitPage',$data);
    }

    public function render(){
        return view('livewire.second-form');
    }
}
