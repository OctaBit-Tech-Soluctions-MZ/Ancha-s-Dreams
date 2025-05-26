<?php

use App\Http\Controllers\OrderInvoice;
use App\Livewire\{
    AboutLivewire,
    ContactLivewire,
    HomeLivewire,
    ReviewLivewire,
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
use App\Livewire\Auth\{
    LoginLivewire,
    RegisterLivewire
};
use App\Livewire\Exams\{
    EditLivewire as ExamsEditLivewire,
    EditQuestionLivewire,
    IndexLivewire as ExamsIndexLivewire,
    MakeLivewire,
    QuestionLivewire,
    RegisterLivewire as ExamsRegisterLivewire,
    ResultLivewire
};
use App\Livewire\Instructor\{
    DashboardLivewire,
    RegisterLivewire as InstructorRegisterLivewire
};
use App\Livewire\Lesson\{
    EditLivewire as LessonEditLivewire,
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
    EditLivewire as ProfileEditLivewire,
    IndexLivewire as ProfileIndexLivewire,
    OrderLivewire,
    PasswordLivewire,
};
use App\Livewire\Users\{
    BlockedLivewire,
    IndexLivewire as UsersIndexLivewire,
    RegisterLivewire as UsersRegisterLivewire
};
use Illuminate\Support\Facades\Route;

Route::middleware([
    'last_user_activity',
    'blocked'
])->group(function () {
    Route::get('/invoice', function () {
        return view('invoice.order-invoice');
    });
    Route::get('/', HomeLivewire::class)->name('home');
    Route::get('/courses', IndexLivewire::class)->name('courses');
    Route::get('/shop', ProductsIndexLivewire::class)->name('shop');
    Route::get('/about', AboutLivewire::class)->name('about');
    Route::get('/contacts', ContactLivewire::class)->name('contacts');
    route::middleware([
        'is_auth'
    ])->group(function () {
        Route::get('/login', LoginLivewire::class)->name('login');
        Route::get('/register', RegisterLivewire::class)->name('register');
    });
    Route::get('/courses/{slug}/show', DetailsLivewire::class)->name('courses.details');
    Route::get('/cart', ShoppingCartLivewire::class)->name('cart');

    Route::middleware([
        'auth',
    ])->group(function () {

        Route::get('/profile', ProfileIndexLivewire::class)->name('profile.show');
        Route::get('/profile/edit', ProfileEditLivewire::class)->name('profile.edit');
        Route::get('/profile/password', PasswordLivewire::class)->name('profile.password');
        Route::middleware([
            'purchased.course'
        ])->group(function () {
            Route::get('/lessons/{slug}/learn', LessonIndexLivewire::class)->name('lessons');
            Route::get('/exam/{id}/make', MakeLivewire::class)->name('exams.make');
        });

        Route::middleware([
            'role:aluno'
        ])->group(function () {
            Route::get('/review/{slug}', ReviewLivewire::class)->name('reviews');
            Route::get('/exam/{attempt_id}/results', ResultLivewire::class)->name('exams.result');
            Route::get('/profile/orders', OrderLivewire::class)->name('profile.orders');
        });

        Route::middleware([
            'role:instrutor',
        ])->group(function () {
            Route::get('/dashboard', DashboardLivewire::class)->name('dashboard');
            Route::get('/instructor/courses', ListLivewire::class)->name('courses.instructor');
            Route::get('/instructor/courses/register', CoursesRegisterLivewire::class)->name('courses.register');
            Route::get('/instructor/courses/{slug}/edit', EditLivewire::class)->name('courses.edit');
            Route::get('/instructor/courses/{slug}/exam', ExamsIndexLivewire::class)->name('exams.list');
            Route::get('/instructor/courses/{slug}/exam/register', ExamsRegisterLivewire::class)->name('exams.register');
            Route::get('/instructor/exam/{id}/edit', ExamsEditLivewire::class)->name('exams.edit');
            Route::get('/instructor/exam/{id}/question', QuestionLivewire::class)->name('question.register');
            Route::get('/instructor/question/{id}/edit', EditQuestionLivewire::class)->name('question.edit');
            Route::get('/instructor/courses/{slug}/lessons', LessonListLivewire::class)->name('lessons.list');
            Route::get('/instructor/courses/{slug}/lessons/register', LessonRegisterLivewire::class)->name('lessons.register');
            Route::get('/instructor/lessons/{slug}/edit', LessonEditLivewire::class)->name('lessons.edit');
        });

        Route::middleware([
            'role:super admin,admin'
        ])->group(function () {
            Route::get('/admin/dashboard', Dashboard::class)->name('admin');
            Route::get('/admin/users', UsersIndexLivewire::class)->name('users.list');
            Route::get('/admin/users/instructor', InstructorRegisterLivewire::class)->name('users.instructor');
            Route::get('/admin/users/register', UsersRegisterLivewire::class)->name('users.admin');
            Route::get('/admin/users/{slug}/blocked', BlockedLivewire::class)->name('users.blocked');
            Route::get('/admin/courses', ListInAdminPaineiLivewire::class)->name('courses.admin');
            Route::get('/admin/products', ProductsListLivewire::class)->name('products.list');
            Route::get('/admin/products/register', ProductsRegisterLivewire::class)->name('products.register');
            Route::get('/admin/products/{slug}/edit', ProductsEditLivewire::class)->name('products.edit');
            Route::get('/orders/{id}/invoice', [OrderInvoice::class, 'index'])->name('orders.invoice');
        });
    });
});
