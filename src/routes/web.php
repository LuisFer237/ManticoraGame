<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Livewire\GameStart;
<<<<<<< HEAD
use App\Livewire\CharacterDetail;
use App\Livewire\Welcome;
=======
use App\Livewire\ChooseWeapons;
>>>>>>> 27840ee7e767b3e2f479daf11de4450d60bf2f8f


Route::get('/game-start', GameStart::class)->name('game.start');
<<<<<<< HEAD
Route::get('/', Welcome::class)->name('welcome');
Route::get('/character/{characterId}', CharacterDetail::class)->name('character.detail');


=======
Route::get("/game-choose-weapons", ChooseWeapons::class)->name("game.choose-weapons");
>>>>>>> 27840ee7e767b3e2f479daf11de4450d60bf2f8f
