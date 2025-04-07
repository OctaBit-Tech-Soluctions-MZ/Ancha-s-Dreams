<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Rotas do Cliente (Aluno e Instrutor)
 * Essas rotas nao precisam de protencao
 * Qualquer uma que acesso ao aplicacao pode aceder a essas rotas
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/show/{slug}', [CourseController::class, 'details'])->name('courses.details');
Route::get('/courses/watch/{slug}', [CourseController::class, 'watch'])->name('courses.watch');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contacts',function () {return view('contacts');})->name('contacts');

/**
 * Rotas Protegidas com Middleware auth
 * Impede que utilizadores nao autenticado tenham acesso a dados sensiveis
 */
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

/**  
 * Rotas do Instrutor
 * Essas rotas estao protegidas por middlewares
 * para evitar com que utilizadores nao autorizado tenham acesso a dados sensiveis
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:3',
    ])->group(function (){
        Route::get('/user/courses',[CourseController::class, 'my_courses'])->name('profile.courses');
        Route::get('/user/courses/{slug}/show', [CourseController::class, 'detailsProfile'])->name('profile.courses.details');
        Route::get('/user/courses/{slug}/edit', [CourseController::class, 'edit'])->name('profile.courses.edit');
        Route::get('/user/courses/{slug}/lesson', [ContentController::class, 'index'])->name('profile.courses.lesson');
        Route::get('/user/courses/register', [CourseController::class, 'register'])->name('courses.register');
        Route::get('/user/courses/{slug}/lesson/add', [ContentController::class, 'add'])->name('courses.lesson.add');
        Route::post('/user/courses/register', [CourseController::class, 'store'])->name('courses.store');
        Route::post('/user/courses/{slug}/lesson/add', [CourseController::class, 'store'])->name('courses.lesson.store');
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

    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/books', [DashboardController::class, 'books'])->name('admin.books');
    Route::get('/admin/courses', [DashboardController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/courses/{slug}', [DashboardController::class, 'courseDetail'])->name('admin.courses.details');
    Route::get('/admin/pricing', [DashboardController::class, 'pricing'])->name('admin.pricing');
    Route::get('/admin/products', [DashboardController::class, 'products'])->name('admin.products');
    Route::get('/admin/feedbacks', [DashboardController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::delete('/admin/courses', [CourseController::class, 'destroy'])->name('admin.courses.delete');
});
