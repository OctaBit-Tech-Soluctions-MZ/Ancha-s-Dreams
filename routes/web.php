<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Rotas do Cliente (aluno e instrutores)

// Metodo HTTP (GET)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/details', [CourseController::class, 'details'])->name('courses.details');
Route::get('/courses/watch', [CourseController::class, 'watch'])->name('courses.watch');
Route::get('/about', function () {
   return view('about'); 
})->name('about');
Route::get('/contacts',function () {
    return view('contacts');
})->name('contacts');

// Rotas do admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:1',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
