<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/proyectos/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');
