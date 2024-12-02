<?php

namespace App\Livewire;

use Livewire\Component;

class Countries extends Component
{

    public $countries = [];
    public $country;
    public $active;
    public $count = 0;

    public function render()
    {
        return view('livewire.countries');
    }

    public function addCountry()
    {
        array_push($this->countries, $this->country);
        $this->country = '';
    }

    public function deleteCountry($index)
    {
        unset($this->countries[$index]);
    }

    public function changeActive($country)
    {
        $this->active = $country;
    }

    public function increment()
    {
        $this->count++;
    }
}
