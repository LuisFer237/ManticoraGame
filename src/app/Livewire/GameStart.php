<?php

namespace App\Livewire;

use App\Models\Defender;
use App\Models\Game;
use Dom\CharacterData;
use Livewire\Component;
use App\Services\RickAndMortyService;

class GameStart extends Component
{
    public $characters = [], $selectedCharacters = [];
    public $page = 1;
    public $info = [];
    public $search = '';

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $service = app(RickAndMortyService::class);

        $data = $service->getCharacters($this->page);
        
        if ($data) {
            $this->characters = $data['results'];
            $this->info = $data['info'];
        } else {
            $this->characters = [];
            $this->info = [];
        }
    }

    public function nextPage()
    {
        // dd("Next page clicked");
        if (isset($this->info['next'])) {
            $this->page++;
            $this->loadData();
        }
    }

    public function previousPage()
    {
        if (isset($this->info['prev'])) {
            $this->page--;
            $this->loadData();
        }
    }

    // Method to search characters by name
    public function searchCharacters()
    {
        $service = app(RickAndMortyService::class);

        $data = $service->getCharactersByName($this->search);

        if ($data) {
            $this->characters = $data['results'];
            $this->info = $data['info'] ?? [];
        } else {
            $this->characters = [];
            $this->info = [];
        }
    }

    public function selectCharacter($characterId)
    {
        $character = collect($this->characters)->firstWhere('id', $characterId);
        if ($character) {
            $this->selectedCharacters[] = $character;
        }
    }

    public function deleteSelectedCharacter($characterId)
    {
        $this->selectedCharacters = array_filter($this->selectedCharacters, function ($char) use ($characterId) {
            return $char['id'] !== $characterId;
        });
    }

    public function startGame()
    {
        
        $newGame = new Game();
        $newGame->status = 'in_progress';
        $newGame->save();


        foreach ($this->selectedCharacters as $key => $value) {
            
            $newCharacter = new Defender();
            $newCharacter->api_id = $value['id'];
            $newCharacter->name = $value['name'];
            $newCharacter->image = $value['image'];
            $newCharacter->save();
        
        }
        if (count($this->selectedCharacters) === 2) {
            return redirect()->route('game.choose-weapons', ['gameId' => $newGame->id]);
        }
    }

    public function render()
    {
        return view('livewire.game-start')->layout('layouts.app');
    }
}