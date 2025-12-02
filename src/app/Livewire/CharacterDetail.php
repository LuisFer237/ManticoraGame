<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\RickAndMortyService;

class CharacterDetail extends Component
{
    public $characterId;
    public $character;

    protected $rickAndMortyService;

    public function boot(RickAndMortyService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function mount($characterId)
    {
        $this->characterId = $characterId;
        $this->fetchCharacter();
    }

    public function fetchCharacter()
    {
        $this->character = $this->rickAndMortyService->getCharacterById($this->characterId);
    }

    public function render()
    {
        return view('livewire.character-detail', [
            'character' => $this->character,
        ])->layout('layouts.app');
    }
}
