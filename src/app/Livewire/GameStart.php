<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\RickAndMortyService;
use Illuminate\Support\Facades\Session;

class GameStart extends Component
{
    public $characters = [], $selectedCharacters = [];
    public $page = 1;
    public $info = [];
    public $search = '';

    public function mount()
    {
        $this->selectedCharacters = Session::get('selectedCharacters', []);
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
            Session::put('selectedCharacters', $this->selectedCharacters);
        }
    }

    public function deleteSelectedCharacter($characterId)
    {
        $this->selectedCharacters = array_filter($this->selectedCharacters, function ($char) use ($characterId) {
            return $char['id'] !== $characterId;
        });
        Session::put('selectedCharacters', $this->selectedCharacters);
    }

    public function startGame()
    {
        $this->selectedCharacters = [];
        Session::forget('selectedCharacters');
    }

    public function render()
    {
        return view('livewire.game-start')->layout('layouts.app');
    }
}