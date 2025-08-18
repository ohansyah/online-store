<?php

namespace App\Livewire;

use Livewire\Component;

class AppHome extends Component
{
    public function render()
    {
        return view('livewire.app-home')->layout('layouts.mobile');
    }
}
