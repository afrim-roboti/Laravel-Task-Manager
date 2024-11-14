<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController; // Importo TaskController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rrugët për TaskController (CRUD për detyrat)
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Lexo të gjitha detyrat
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Formulari për krijimin e një detyre të re
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Krijo një detyrë
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show'); // Lexo një detyrë të caktuar
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Formulari për përditësimin e një detyre
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Përditëso një detyrë
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Fshij një detyrë
});


require __DIR__.'/auth.php';

