<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TinyMCEController,
    BlogInteractionController
};
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
    FaqController,
    SiteSettingController,
    FaqCategoryController,
};
use App\Http\Controllers\Frontend\{
    FrontendController,
    ServiceController as FrontendServiceController,
    CountryController as FrontendCountryController,
    TeamController as FrontendTeamController,
    AboutController as FrontendAboutController,
    BlogController as FrontendBlogController
};

// -------------------- FRONTEND --------------------
Route::get('/', [FrontendController::class, 'index']);

Route::get('/service/{slug}', [FrontendServiceController::class, 'show'])->name('service.show');
Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');

Route::get('/countries/{slug}', [FrontendCountryController::class, 'show'])->name('countries.show');
Route::get('/countries', [FrontendCountryController::class, 'index'])->name('countries.index');

Route::get('/teams/{slug}', [FrontendTeamController::class, 'show'])->name('teams.show');
Route::get('/teams', [FrontendTeamController::class, 'index'])->name('teams.index');

Route::get('/about', [FrontendAboutController::class, 'index']);

Route::get('/news', [FrontendBlogController::class, 'index']);
Route::get('/news/{slug}', [FrontendBlogController::class, 'show'])->name('news.show');

Route::post('/blogs/{blog}/comments', [BlogInteractionController::class, 'addComment'])->name('blogs.comments.store');
Route::post('/blogs/{blog}/view', [BlogInteractionController::class, 'countView'])->name('blogs.view');
Route::get('/blogs/{blog}', [FrontendBlogController::class, 'show'])->name('blogs.show');

// Other frontend pages
Route::view('/contact', 'frontend.contact');
Route::view('/coaching', 'frontend.coaching');
Route::view('/team', 'frontend.team');

// -------------------- ADMIN --------------------
Route::prefix('admin')->name('admin.')->group(function () {
    // redirect root
    Route::get('/', fn() => session('admin_logged_in')
        ? redirect()->route('admin.dashboard')
        : redirect()->route('admin.login'));

    // Auth
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

        Route::post('/tinymce/upload', [TinyMCEController::class, 'upload'])->name('tinymce.upload');

        // Resources
        Route::resource('services', ServiceController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('success-stories', SuccessStoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('site-settings', SiteSettingController::class, [
            'parameters' => ['site-settings' => 'setting']
        ]);
        Route::resource('faq', FaqController::class, );
        Route::resource('faq-categories', FaqCategoryController::class);

        // About
        Route::get('about', [AboutUsController::class, 'edit'])->name('about.edit');
        Route::put('about', [AboutUsController::class, 'update'])->name('about.update');
    });
});