<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rotas do Cliente (aluno e instrutores)

// Metodo HTTP (GET)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/details/{id}', [CourseController::class, 'details'])->name('courses.details');
Route::get('/courses/watch/{id}', [CourseController::class, 'watch'])->name('courses.watch');
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
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::get('/admin/books', [BookController::class, 'show'])->name('books.show');
    Route::get('/admin/courses', [CourseController::class, 'show'])->name('courses.show');
});
