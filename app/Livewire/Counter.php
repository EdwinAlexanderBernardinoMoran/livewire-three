<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function render()
    {
        return view('livewire.counter');
    }

    public function decrease()
    {
        $this->count--;
    }

    public function increase()
    {
        $this->count++;
    }

    public function resetCounter()
    {
        $this->count = 0;
    }
}
