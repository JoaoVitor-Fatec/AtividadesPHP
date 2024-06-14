<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogoController;

Route::resource('jogos', JogoController::class);
Route::get('jogos/{id}/delete', [JogoController::class, 'delete'])->name('jogos.delete');
