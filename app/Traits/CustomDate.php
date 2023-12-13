<?php

namespace App\Traits;

trait CustomDate
{
    public $maximumDays = 31;
    public $allMonths = [
        array('month' => 'January', 'day' => 31),
        array('month' => 'February', 'day' => 28), 
        array('month' => 'March', 'day' => 31),
        array('month' => 'April', 'day' => 30),
        array('month' => 'May', 'day' => 31),
        array('month' => 'June', 'day' => 30),
        array('month' => 'July', 'day' => 31),
        array('month' => 'August', 'day' => 31),
        array('month' => 'September', 'day' => 30),
        array('month' => 'October', 'day' => 31),
        array('month' => 'November', 'day' => 30),
        array('month' => 'December', 'day' => 31)
    ];

    public function updatedMonth(){
        if($this->month) $this->maximumDays = ($this->allMonths[$this->month-1]['day']);
        $this->reset('day');
    }
}