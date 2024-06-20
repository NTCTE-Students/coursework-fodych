<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
