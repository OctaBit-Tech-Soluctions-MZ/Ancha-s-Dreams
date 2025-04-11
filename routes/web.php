<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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
Route::get('/cursos/estudar/{slug}', [ContentController::class, 'watch'])->name('courses.watch');
Route::get('/sobre', function () { return view('about'); })->name('about');
Route::get('/contactos',function () {return view('contacts');})->name('contacts');

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
    'role:instructor',
    ])->group(function (){
        Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
        Route::get('/instrutor/cursos',[InstructorController::class, 'courses'])->name('instructor.courses');
        Route::get('/instrutor/cursos/{slug}/detalhes', [CourseController::class, 'moreInfo'])->name('instructor.courses.details');
        Route::get('/instrutor/cursos/{slug}/editar', [CourseController::class, 'edit'])->name('instructor.courses.edit');
        Route::get('/instrutor/cursos/{slug}/aula', [ContentController::class, 'index'])->name('instructor.courses.lesson');
        Route::get('/instrutor/cursos/registar', [CourseController::class, 'register'])->name('instructor.courses.register');
        Route::get('/instrutor/cursos/{slug}/aula/adicionar', [ContentController::class, 'add'])->name('instructor.courses.lesson.add');
        Route::get('/instrutor/livros', [InstructorController::class, 'books'])->name('instructor.books');
        Route::get('/instructor/perfil', [ProfileController::class, 'instructor'])->name('instructor.profile');
        Route::post('/instrutor/cursos/registar', [CourseController::class, 'store'])->name('instructor.courses.store');
        Route::post('/instrutor/cursos/{slug}/aula/adicionar', [ContentController::class, 'store'])->name('instructor.courses.lesson.store');
        Route::put('/instrutor/cursos/{slug}/editar', [CourseController::class, 'update'])->name('instructor.courses.update');
        Route::delete('/instrutor/cursos/{slug}/excluir',[CourseController::class, 'destroy'])->name('profile.courses.delete');
    });

// Rotas do admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/utilizadores', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/utilizadores/registar', [AdminController::class, 'registerUser'])->name('admin.users.register');
    Route::get('/admin/utilizadores/{id}/editar', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/instrutores', [AdminController::class, 'instructor'])->name('admin.instructor');
    Route::get('/admin/instrutores/registar', [AdminController::class, 'registerInstructor'])->name('admin.instructor.register');
    Route::get('/admin/alunos', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/livros', [AdminController::class, 'books'])->name('admin.books');
    Route::get('/admin/cursos', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/cursoss/{slug}', [AdminController::class, 'courseDetail'])->name('admin.courses.details');
    Route::get('/admin/produtos', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/feedbacks', [AdminController::class, 'feedbacks'])->name('admin.feedbacks');
    Route::post('/admin/instrutores/registar', [UserController::class, 'storeInstructor'])->name('admin.instructor.store');
    Route::post('/admin/utilizadores/registar', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/cursos', [CourseController::class, 'destroy'])->name('admin.courses.delete');
    Route::delete('/admin/utilizadores/{id}/excluir',[UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/admin/utilizadores/{id}/editar', [UserController::class, 'update'])->name('admin.users.update');
});

// google drive api test connection
// Route::get('/teste-drive', function (\App\Services\GoogleDriveService $gds) {
//     return $gds->testConnection();
// });

// // google drive api upload test
// Route::get('/upload-teste', function (\App\Services\GoogleDriveService $gds) {
//     $localPath = storage_path('app/teste.pdf'); // ou qualquer arquivo local
//     $fileId = $gds->uploadFile($localPath, 'MeuArquivo.pdf', 'application/pdf');
//     return 'Upload feito! ID: ' . $fileId;
// });

// Route::get('/list-drive', function ()  {
//     $gds = new \App\Services\GoogleDriveService();
//     echo '<pre>';
//         $gds->listarArquivos();echo '</pre>';
// });

