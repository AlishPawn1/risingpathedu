<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminAuthController,
    ServiceController,
    CountryController,
    SuccessStoryController,
    AboutUsController,
    BlogController,
    TagController,
    CategoryController,
    TeamController,
    TestimonialController,
    CourseController,
};

// Frontend routes
Route::get('/', fn() => view('frontend.index'));
Route::get('/about', fn() => view('frontend.about'));
Route::get('/contact', fn() => view('frontend.contact'));
Route::get('/coaching', fn() => view('frontend.coaching'));
Route::get('/country', fn() => view('frontend.country'));
Route::get('/faq', fn() => view('frontend.faq'));
Route::get('/news', fn() => view('frontend.news'));
Route::get('/service', fn() => view('frontend.service'));
Route::get('/team', fn() => view('frontend.team'));

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {

    // /admin root redirect
    Route::get('/', function () {
        return session('admin_logged_in')
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // Public login routes
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        // Resource routes
        Route::resource('services', ServiceController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('success-stories', SuccessStoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('courses', CourseController::class);

        // About us
        Route::get('about', [AboutUsController::class, 'edit'])->name('about.edit');
        Route::put('about', [AboutUsController::class, 'update'])->name('about.update');

    });
});