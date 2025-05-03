<?php

use App\Livewire\{
    AboutLivewire,
    ContactLivewire,
    HomeLivewire,
    MiniShopLivewire
};
use App\Livewire\Admin\Dashboard;
use App\Livewire\Courses\{
    DetailsLivewire,
    EditLivewire,
    IndexLivewire,
    ListLivewire,
    RegisterLivewire as CoursesRegisterLivewire
};
use App\Livewire\Books\{
    IndexLivewire as BooksIndexLivewire
};
use App\Livewire\Auth\{
    LoginLivewire,
    RegisterLivewire
};
use App\Livewire\Instructor\{
    DashboardLivewire
};
use App\Livewire\Lesson\{
    EditLivewire as LessonEditLivewire,
    ExamFinalLivewire,
    IndexLivewire as LessonIndexLivewire,
    ListLivewire as LessonListLivewire,
    RegisterLivewire as LessonRegisterLivewire,
};
use App\Livewire\Profile\{
    ShowLivewire
};
use App\Livewire\Recipes\{
    ListLivewire as RecipesListLivewire
};
use App\Livewire\Users\{
    IndexLivewire as UsersIndexLivewire
};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeLivewire::class)->name('home');
Route::get('/courses', IndexLivewire::class)->name('courses');
Route::get('/books', BooksIndexLivewire::class)->name('books');
Route::get('/shop', MiniShopLivewire::class)->name('shop');
Route::get('/about', AboutLivewire::class)->name('about');
Route::get('/contacts', ContactLivewire::class)->name('contacts');
Route::get('/login', LoginLivewire::class)->name('login');
Route::get('/register', RegisterLivewire::class)->name('register');
Route::get('/courses/{slug}/show', DetailsLivewire::class)->name('courses.details');

Route::middleware([
    'auth'
])->group(function () {
    Route::get('/profile', ShowLivewire::class)->name('profile.show');
});

Route::middleware([
    'auth',
    'role:student'
])->group(function () {
    Route::get('/lessons/{slug}/learn', LessonIndexLivewire::class)->name('lessons');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:instructor',
])->group(function () {
    Route::get('/dashboard', DashboardLivewire::class)->name('dashboard');
    Route::get('/instructor/courses', ListLivewire::class)->name('courses.instructor');
    Route::get('/instructor/courses/register', CoursesRegisterLivewire::class)->name('courses.register');
    Route::get('/instructor/courses/{slug}/edit', EditLivewire::class)->name('courses.edit');
    Route::get('/instructor/courses/{slug}/exam', ExamFinalLivewire::class)->name('courses.exam');
    Route::get('/instructor/courses/{slug}/lessons', LessonListLivewire::class)->name('lessons.list');
    Route::get('/instructor/courses/{slug}/lessons/register', LessonRegisterLivewire::class)->name('lessons.register');
    Route::get('/instructor/lessons/{slug}/edit', LessonEditLivewire::class)->name('lessons.edit');
    Route::get('/instructor/lessons/{slug}/recipes', RecipesListLivewire::class)->name('lessons.recipes');
});

Route::middleware([
    'auth',
    'role:super-admin,admin'
])->group(function ()  {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin');
    Route::get('/admin/users', UsersIndexLivewire::class)->name('users.list');
});