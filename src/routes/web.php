<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Livewire\GameStart;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/game-start', GameStart::class)->name('game.start');


Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');


