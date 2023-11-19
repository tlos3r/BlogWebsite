<?php

use App\Http\Controllers\ApprovedPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Models\ApprovedPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/category', CategoryController::class)->middleware('role:admin')->except('index', 'show')->names('categories');

    Route::resource('/tag', TagController::class)->middleware('role:admin')->except('index', 'show')->names('tags');

    Route::resource('/post', PostController::class)->except('index')->names('posts');

    Route::resource('/approved', ApprovedPostController::class)->middleware('role:admin')->names('approveds');

    Route::resource('/comment', CommentController::class)->names('comments');

    Route::get('/', [PostController::class, 'index'])->name('main');
    Route::get('/post', [PostController::class, 'index'])->name('post.index');

    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('tag/{tag}', [TagController::class, 'show'])->name('tag.show');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('/search', [SearchController::class, 'search'])->name('search');
});

require __DIR__ . '/auth.php';