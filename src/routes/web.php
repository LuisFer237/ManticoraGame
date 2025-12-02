<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Livewire\GameStart;
use App\Livewire\ChooseWeapons;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/game-start', GameStart::class)->name('game.start');
Route::get("/game-choose-weapons", ChooseWeapons::class)->name("game.choose-weapons");
