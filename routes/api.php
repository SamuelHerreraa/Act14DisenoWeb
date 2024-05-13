<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/notes', [NoteController::class, 'index']);

Route::get('/notes/{id}', [NoteController::class, 'show']);

Route::post('/notes', [NoteController::class, 'store']);

Route::put('/notes/{id}', [NoteController::class, 'update']);

Route::patch('/notes/{id}', [NoteController::class, 'updatePartial']);

Route::delete('/notes/{id}', [NoteController::class, 'destroy']);