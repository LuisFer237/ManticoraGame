<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class RickAndMortyService
{
    // Method to get characters with pagination
    public function getCharacters($page = 1)
    {
        $response = Http::timeout(5)->get('https://rickandmortyapi.com/api/character', [
            'page' => $page
        ]);

        if ($response->failed()) return null;

        $data = $response->json();

        $results = collect($data['results'])->map(function ($char) {
            return [
                'id' => $char['id'],
                'name' => $char['name'],
                'image' => $char['image'],
                'status' => $char['status'],
                'species' => $char['species'], 
                'type' => $char['type'],       
                'gender' => $char['gender']    
            ];
        })->toArray();

        return [
            'info' => $data['info'],
            'results' => $results
        ];
    }

    // Method to get characters by name
    public function getCharactersByName($name)
    {
        $response = Http::timeout(5)->get('https://rickandmortyapi.com/api/character', [
            'name' => $name
        ]);

        if ($response->failed()) return null;

        $data = $response->json();

        $results = collect($data['results'] ?? [])->map(function ($char) {
            return [
                'id' => $char['id'],
                'name' => $char['name'],
                'image' => $char['image'],
                'status' => $char['status'],
                'species' => $char['species'],
                'type' => $char['type'],
                'gender' => $char['gender']
            ];
        })->toArray();

        return [
            'info' => $data['info'] ?? [],
            'results' => $results
        ];
    }

    // Method to get a single character by ID
    public function getCharacterById($id)
    {
        $response = Http::timeout(5)->get("https://rickandmortyapi.com/api/character/" . $id);

        if ($response->failed()) return null;

        return $response->json();
    }
}