<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    public $title, $name, $email;

    public function mount(User $user)
    {
        // Forma 1
        // $this->name = $user->name;
        // $this->email = $user->email;

        // Forma 2
        $this->fill($user->only(['name', 'email']));
    }
    public function render()
    {
        return view('livewire.create-post');
    }

    public function save()
    {
        // dd($this->name);
    }
}
