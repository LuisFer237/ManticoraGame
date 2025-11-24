<?php

namespace App\Livewire;

use Livewire\Component;

class GameStart extends Component
{
    public function render()
    {
        return view('livewire.game-start')
            ->layout('layouts.app');
    }
}
