<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Livewire\GameStart;
use App\Livewire\CharacterDetail;
use App\Livewire\Welcome;


Route::get('/game-start', GameStart::class)->name('game.start');
Route::get('/', Welcome::class)->name('welcome');
Route::get('/character/{characterId}', CharacterDetail::class)->name('character.detail');


