<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rotas do Cliente (aluno e instrutores)

// Metodo HTTP (GET)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/show/{slug}', [CourseController::class, 'details'])->name('courses.details');
Route::get('/courses/watch/{slug}', [CourseController::class, 'watch'])->name('courses.watch');
Route::get('/about', function () {
   return view('about'); 
})->name('about');
Route::get('/contacts',function () {
    return view('contacts');
})->name('contacts');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){
    Route::get('/user/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/user/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/user/pricing', [ProfileController::class, 'pricing'])->name('profile.pricing');
    Route::get('/user/image', [ProfileController::class, 'image'])->name('profile.image');
    Route::put('/user/edit',[ProfileController::class, 'update'])->name('profile.update');
    Route::put('/user/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Rotas do Instrutor
// Essas rotas estao protegidas por middlewares
// para evitar com que utilizadores nao autorizado tenham acesso a dados sensiveis
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:3',
    ])->group(function (){
        Route::get('/user/courses',[CourseController::class, 'my_courses'])->name('profile.courses');
        Route::get('/user/courses/{slug}/show', [CourseController::class, 'detailsProfile'])->name('profile.courses.details');
        Route::get('/user/courses/register', [CourseController::class, 'register'])->name('courses.register');
        Route::get('/user/courses/{slug}/edit', [CourseController::class, 'edit'])->name('profile.courses.edit');
        Route::post('/user/courses/register', [CourseController::class, 'store'])->name('courses.store');
        Route::put('/user/courses/{slug}/edit', [CourseController::class, 'update'])->name('profile.courses.update');
        Route::delete('/user/courses/{slug}/delete',[CourseController::class, 'destroy'])->name('profile.courses.delete');
    });

// Rotas do admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:1',
])->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::get('/admin/books', [BookController::class, 'show'])->name('books.show');
    Route::get('/admin/courses', [CourseController::class, 'show'])->name('courses.show');
});
