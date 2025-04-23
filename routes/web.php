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
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/**
 * Rotas do Cliente (Aluno e Instrutor)
 * Essas rotas nao precisam de protencao
 * Qualquer uma que acesso ao aplicacao pode aceder a essas rotas
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/livros', [BookController::class, 'index'])->name('book');
Route::get('/cursos', [CourseController::class, 'index'])->name('courses');
Route::get('/cursos/detalhes/{slug}', [CourseController::class, 'details'])->name('courses.details');
Route::get('/cursos/aula/{slug}', [ContentController::class, 'watch'])->name('courses.watch');
Route::get('/sobre', function () { return view('about'); })->name('about');
Route::get('/contactos',function () {return view('contacts');})->name('contacts');
Route::get('/receitas', function () {return view('receita');})->name('receita');
Route::get('/registo',[UserController::class, 'register'])->name('register');
Route::post('/registo', [UserController::class, 'store'])->name('register');
Route::get('/instrutor/front-teste', function () {
    return view('courses.register');
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
    Route::get('/aluno/perfil', [ProfileController::class, 'index'])->name('profile.show');
    Route::get('/aluno/senha', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/aluno/editar', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/aluno/foto', [ProfileController::class, 'image'])->name('profile.image');
    Route::put('/aluno/editar',[ProfileController::class, 'update'])->name('profile.update');
    Route::put('/aluno/senha', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/add-to-curt', [CartController::class, 'add'])->name('cart.add');
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
        Route::get('/instrutor/cursos',[InstructorController::class, 'courses'])->name('instructor.courses');
        Route::get('/instrutor/cursos/detalhes/{slug}', [CourseController::class, 'moreInfo'])->name('instructor.courses.details');
        Route::get('/instrutor/cursos/editar/{slug}', [CourseController::class, 'edit'])->name('instructor.courses.edit');
        Route::get('/instrutor/cursos/aula/{slug}', [ContentController::class, 'index'])->name('instructor.courses.lesson');
        Route::get('/instrutor/cursos/registar', [CourseController::class, 'register'])->name('instructor.courses.register');
        Route::get('/instrutor/cursos/aula/{slug}/adicionar', [ContentController::class, 'add'])->name('instructor.courses.lesson.add');
        Route::get('/instrutor/receitas', [RecipeController::class, 'list'])->name('instructor.recipes');
        Route::get('/instructor/perfil', [ProfileController::class, 'instructor'])->name('instructor.profile');
        Route::post('/instrutor/cursos/registar', [CourseController::class, 'store'])->name('instructor.courses.store');
        Route::post('/instrutor/cursos/aula/{slug}/adicionar', [ContentController::class, 'store'])->name('instructor.courses.lesson.store');
        Route::put('/instrutor/cursos/editar/{slug}', [CourseController::class, 'update'])->name('instructor.courses.update');
        Route::delete('/instrutor/cursos/excluir/{slug}',[CourseController::class, 'destroy'])->name('courses.delete');
    });

// Rotas do admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/utilizadores', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/utilizadores/registar', [AdminController::class, 'register'])->name('admin.users.register');
    Route::get('/admin/utilizadores/{slug}/editar', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/instrutores', [AdminController::class, 'instructor'])->name('admin.instructor');
    Route::get('/admin/instrutores/registar', [InstructorController::class, 'register'])->name('admin.instructor.register');
    Route::get('/admin/instrutores/{slug}/editar', [InstructorController::class, 'edit'])->name('admin.instructor.edit');
    Route::get('/admin/alunos', [UserController::class, 'index'])->name('admin.students');
    Route::get('/admin/livros', [AdminController::class, 'books'])->name('admin.books');
    Route::get('/admin/livros/registar', [BookController::class, 'register'])->name('admin.books.register');
    Route::get('/admin/cursos', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/cursoss/{slug}', [AdminController::class, 'courseDetail'])->name('admin.courses.details');
    Route::get('/admin/produtos', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::post('/admin/instrutores/registar', [InstructorController::class, 'store'])->name('admin.instructor.store');
    Route::post('/admin/utilizadores/registar', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/livros/registar', [BookController::class, 'store'])->name('admin.books.store');
    Route::delete('/admin/cursos', [CourseController::class, 'destroy'])->name('admin.courses.delete');
    Route::delete('/admin/utilizadores/{id}/excluir',[UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/admin/utilizadores/{slug}/editar', [UserController::class, 'update'])->name('admin.users.update');
    Route::put('/admin/instrutores/{slug}/editar', [InstructorController::class, 'update'])->name('admin.instructor.update');
});

// google drive api route test connection
 Route::get('/teste-drive', function (\App\Services\GoogleDriveService $gds) {
     return $gds->testConnection();
 });

// // google drive api upload route test
 Route::get('/upload-teste', function (\App\Services\GoogleDriveService $gds) {
     $localPath = storage_path('app/teste.pdf'); // ou qualquer arquivo local
     $fileId = $gds->uploadFile($localPath, 'MeuArquivo.pdf', 'application/pdf');
     return 'Upload feito! ID: ' . $fileId->id;
 });

 Route::get('/list-drive', function ()  {
     $gds = new \App\Services\GoogleDriveService();
     echo '<pre>';
        var_dump($gds->listArchives());echo '</pre>';
 });

// Mpesa Api Rota de Teste

// Route::get('/mpesa-teste',[PaymentController::class, 'mpesaC2B']);