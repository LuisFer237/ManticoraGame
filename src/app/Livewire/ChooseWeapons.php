<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;

class ChooseWeapons extends Component
{

    public $game;

    public function render()
    {
        return view('livewire.choose-weapons')->layout('layouts.app');
    }

    public function mount($gameId){
        $this->game = Game::find($gameId);
    }

    

}
