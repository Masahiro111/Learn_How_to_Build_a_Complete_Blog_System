<?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// Front User Routes

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('post.show');

Route::post('/posts/{post:slug}', [PostController::class, 'addComment'])
    ->name('post.add_comment');


Route::get('/about', Aboutcontroller::class)->name('about');

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/tags/{tag:name}', [TagController::class, 'show'])
    ->name('tags.show');

require __DIR__ . '/auth.php';


// Admin Dashboard Routes

Route::prefix('admin')->name('admin.')->middleware(['auth', 'isadmin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('index');

    Route::resource('posts', AdminPostsController::class);
    Route::resource('categories', AdminCategoriesController::class);
});
