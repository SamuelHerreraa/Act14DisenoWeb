<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/notes', function () {
    return view('index');
});

Route::get('/notes/add', function () {
    return view('add');
});

Route::get('/notes/show', [NoteController::class, 'showgeneral']);


Route::post('/notes', [NoteController::class, 'store']);


Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.delete');
