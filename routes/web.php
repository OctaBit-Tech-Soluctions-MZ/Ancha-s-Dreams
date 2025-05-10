<?php

use App\Livewire\{
    AboutLivewire,
    ContactLivewire,
    HomeLivewire,
    ShoppingCartLivewire
};
use App\Livewire\Admin\{
    Dashboard
};
use App\Livewire\Courses\{
    DetailsLivewire,
    EditLivewire,
    IndexLivewire,
    ListInAdminPaineiLivewire,
    ListLivewire,
    RegisterLivewire as CoursesRegisterLivewire
};
use App\Livewire\Books\{
    EditLivewire as BooksEditLivewire,
    IndexLivewire as BooksIndexLivewire,
    ListLivewire as BooksListLivewire,
    RegisterLivewire as BooksRegisterLivewire
};
use App\Livewire\Auth\{
    LoginLivewire,
    RegisterLivewire
};
use App\Livewire\Instructor\{
    DashboardLivewire,
    RegisterLivewire as InstructorRegisterLivewire
};
use App\Livewire\Lesson\{
    EditLivewire as LessonEditLivewire,
    ExamFinalLivewire,
    IndexLivewire as LessonIndexLivewire,
    ListLivewire as LessonListLivewire,
    RegisterLivewire as LessonRegisterLivewire,
};
use App\Livewire\Products\{
    EditLivewire as ProductsEditLivewire,
    IndexLivewire as ProductsIndexLivewire,
    ListLivewire as ProductsListLivewire,
    RegisterLivewire as ProductsRegisterLivewire
};
use App\Livewire\Profile\{
    ShowLivewire
};
use App\Livewire\Recipes\{
    ListLivewire as RecipesListLivewire
};
use App\Livewire\Users\{
    IndexLivewire as UsersIndexLivewire,
    PermissionsLivewire,
    RegisterLivewire as UsersRegisterLivewire
};
use Illuminate\Support\Facades\Route;

Route::middleware([
    'last_user_activity'
])->group(function () {
    Route::get('/', HomeLivewire::class)->name('home');
    Route::get('/courses', IndexLivewire::class)->name('courses');
    Route::get('/books', BooksIndexLivewire::class)->name('books');
    Route::get('/shop', ProductsIndexLivewire::class)->name('shop');
    Route::get('/about', AboutLivewire::class)->name('about');
    Route::get('/contacts', ContactLivewire::class)->name('contacts');
    Route::get('/login', LoginLivewire::class)->name('login');
    Route::get('/register', RegisterLivewire::class)->name('register');
    Route::get('/courses/{slug}/show', DetailsLivewire::class)->name('courses.details');
    Route::get('/cart', ShoppingCartLivewire::class)->name('cart');

    Route::middleware([
        'auth'
    ])->group(function () {
        Route::get('/profile', ShowLivewire::class)->name('profile.show');
    });

    Route::middleware([
        'auth',
        'role:aluno'
    ])->group(function () {
        Route::get('/lessons/{slug}/learn', LessonIndexLivewire::class)->name('lessons');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'role:instrutor',
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
        'role:super admin,admin'
    ])->group(function () {
        Route::get('/admin/dashboard', Dashboard::class)->name('admin');
        Route::get('/admin/users', UsersIndexLivewire::class)->name('users.list');
        Route::get('/admin/users/instructor', InstructorRegisterLivewire::class)->name('users.instructor');
        Route::get('/admin/users/register', UsersRegisterLivewire::class)->name('users.admin');
        Route::get('/admin/users/{slug}/permissions', PermissionsLivewire::class)->name('users.permissions');
        Route::get('/admin/books', BooksListLivewire::class)->name('books.list');
        Route::get('/admin/books/register', BooksRegisterLivewire::class)->name('books.register');
        Route::get('/admin/books/{slug}/edit', BooksEditLivewire::class)->name('books.edit');
        Route::get('/admin/courses', ListInAdminPaineiLivewire::class)->name('courses.admin');
        Route::get('/admin/products', ProductsListLivewire::class)->name('products.list');
        Route::get('/admin/products/register', ProductsRegisterLivewire::class)->name('products.register');
        Route::get('/admin/products/{slug}/edit', ProductsEditLivewire::class)->name('products.edit');
    });
});
