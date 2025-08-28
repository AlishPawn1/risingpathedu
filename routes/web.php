<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
  ServiceController,
  CountryController,
  SuccessStoryController,
  AboutUsController,
  BlogController,
  TagController,
  CategoryController
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

// Protected admin routes
Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
  
  // Resource routes
  Route::resource('services', ServiceController::class);
  Route::resource('countries', CountryController::class);
  Route::resource('success-stories', SuccessStoryController::class);
  Route::resource('tags', TagController::class);
  Route::resource('categories', CategoryController::class);
  
  // blog routes
  Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
  Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
  Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');
  Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
  Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
  Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
  Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

  // About us routes
  Route::get('about', [AboutUsController::class, 'edit'])->name('about.edit');
  Route::put('about', [AboutUsController::class, 'update'])->name('about.update');
  
  // Other admin routes
  Route::get('/event', fn() => view('admin.event'))->name('event');
  Route::get('/portfolio', fn() => view('admin.portfolio'))->name('portfolio');
  Route::get('/testimonials', fn() => view('admin.testimonials'))->name('testimonials');
  Route::get('/career', fn() => view('admin.career'))->name('career');
  Route::get('/teams', fn() => view('admin.teams'))->name('teams');
  Route::get('/education', fn() => view('admin.education'))->name('education');
  Route::get('/service', fn() => view('admin.service'))->name('service');
});