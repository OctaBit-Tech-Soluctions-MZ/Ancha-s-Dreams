<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/**
 * Rotas do Cliente (Aluno e Instrutor)
 * Essas rotas nao precisam de protencao
 * Qualquer uma que acesso ao aplicacao pode aceder a essas rotas
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('book');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes');
Route::get('/courses/{slug}/show', [CourseController::class, 'details'])->name('courses.details');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contacts',function () {return view('contacts');})->name('contacts');
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('/lesson', function () {
    return view('lesson');
});

/**
 * Rotas Protegidas com Middleware auth
 * Impede que utilizadores nao autenticado tenham acesso a dados sensiveis
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function (){
    Route::get('/lesson/{slug}/watch', [ContentController::class, 'index'])->name('lesson');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
    Route::get('/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/photo', [ProfileController::class, 'image'])->name('profile.image');
    Route::put('/edit',[ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
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
    'role:instructor',
    ])->group(function (){
        Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
        Route::get('/instructor/courses',[InstructorController::class, 'courses'])->name('instructor.courses');
        Route::get('/instructor/courses/{slug}/edit', [CourseController::class, 'edit'])->name('instructor.courses.edit');
        Route::get('/instructor/courses/register', [CourseController::class, 'register'])->name('instructor.courses.register');
        Route::get('/instructor/courses/{slug}/lessons', [ContentController::class, 'lessons'])->name('instructor.lessons');
        Route::get('/instructor/lessons/{slug}/register', [ContentController::class, 'add'])->name('instructor.lessons.add');
        Route::get('/instructor/lesson/{slug}/edit', [ContentController::class, 'edit'])->name('instructor.lesson.edit');
        Route::get('/instructor/lesson/{slug}/quiz', [QuizController::class, 'quiz'])->name('instructor.quiz');
        Route::get('/instructor/recipes', [RecipeController::class, 'list'])->name('instructor.recipes');
        Route::get('/instructor/recipes/register', [RecipeController::class, 'register'])->name('instructor.recipes.register');
        Route::get('/instructor/recipe/{slug}/edit', [RecipeController::class, 'edit'])->name('instructor.recipes.edit');
        Route::get('/instructor/profile', [ProfileController::class, 'instructor'])->name('instructor.profile');
        Route::get('/instructor/profile/password', [ProfileController::class, 'password_instructor'])->name('instructor.profile.password');
        Route::get('/instructor/profile/edit', [ProfileController::class, 'edit_instructor'])->name('instructor.profile.edit');
        Route::put('/instructor/courses/{slug}/edit', [CourseController::class, 'update'])->name('instructor.courses.update');
        Route::put('/instructor/lesson/{slug}/edit', [ContentController::class, 'update'])->name('instructor.lesson.update');
        Route::put('/instructor/recipes/{slug}/edit', [RecipeController::class , 'update'])->name('instructor.recipes.update');
        Route::post('/instructor/courses/register', [CourseController::class, 'store'])->name('instructor.courses.store');
        Route::post('/instructor/lessons/{slug}/register', [ContentController::class, 'store'])->name('instructor.lesson.store');
        Route::post('/instructor/recipes/register', [RecipeController::class, 'store'])->name('instructor.recipes.store');
        Route::delete('/instructor/courses/{slug}/delete',[CourseController::class, 'destroy'])->name('courses.delete');
        Route::delete('/instructor/lesson/{slug}/delete', [ContentController::class, 'destroy'])->name('lesson.delete');
        Route::delete('/instructor/recipe/{slug}/delete', [RecipeController::class, 'destroy'])->name('recipes.delete');
    });
// Rotas do admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin,super admin'
])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/register', [AdminController::class, 'register'])->name('admin.users.register');
    Route::get('/admin/users/{slug}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/instructors', [AdminController::class, 'instructor'])->name('admin.instructor');
    Route::get('/admin/instructors/register', [InstructorController::class, 'register'])->name('admin.instructor.register');
    Route::get('/admin/instructors/{slug}/edit', [InstructorController::class, 'edit'])->name('admin.instructor.edit');
    Route::get('/admin/student', [UserController::class, 'index'])->name('admin.students');
    Route::get('/admin/books', [AdminController::class, 'books'])->name('admin.books');
    Route::get('/admin/books/register', [BookController::class, 'register'])->name('admin.books.register');
    Route::get('/admin/courses', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/courses/{slug}', [AdminController::class, 'courseDetail'])->name('admin.courses.details');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::put('/admin/users/{slug}/edit', [UserController::class, 'update'])->name('admin.users.update');
    Route::put('/admin/instructors/{slug}/edit', [InstructorController::class, 'update'])->name('admin.instructor.update');
    Route::post('/admin/instructors/register', [InstructorController::class, 'store'])->name('admin.instructor.store');
    Route::post('/admin/users/register', [AdminController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/books/register', [BookController::class, 'store'])->name('admin.books.store');
    Route::delete('/admin/courses', [CourseController::class, 'destroy'])->name('admin.courses.delete');
    Route::delete('/admin/users/{id}/delete',[UserController::class, 'destroy'])->name('admin.users.destroy');
});

// google drive api route test connection
//  Route::get('/teste-drive', function (\App\Services\GoogleDriveService $gds) {
//      return $gds->testConnection();
//  });

// // // google drive api upload route test
//  Route::get('/upload-teste', function (\App\Services\GoogleDriveService $gds) {
//      $localPath = storage_path('app/teste.pdf'); // ou qualquer arquivo local
//      $fileId = $gds->uploadFile($localPath, 'MeuArquivo.pdf', 'application/pdf');
//      return 'Upload feito! ID: ' . $fileId->id;
//  });

//  Route::get('/list-drive', function ()  {
//      $gds = new \App\Services\GoogleDriveService();
//      echo '<pre>';
//         var_dump($gds->listArchives());echo '</pre>';
//  });

// Mpesa Api Rota de Teste

// Route::get('/mpesa-teste',[PaymentController::class, 'mpesaC2B']);