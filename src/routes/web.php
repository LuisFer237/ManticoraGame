<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\GameStart as GameStart;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/game-start', GameStart::class)->name('game.start');


