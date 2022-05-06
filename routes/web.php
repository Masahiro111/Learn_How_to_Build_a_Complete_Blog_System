<?php

use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('/tags/{tag:slug}', [TagController::class, 'show'])
    ->name('tags.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
