<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('news', NewsController::class);
    Route::put('comments/{id}/status', [CommentController::class, 'updateStatus'])->name('comments.updateStatus');
    Route::resource('comments', CommentController::class);
    Route::resource('likes', LikeController::class);
});

// API
Route::get('/api/articles', [\App\Http\Controllers\Api\ArticleController::class, 'index']);
Route::get('/api/articles/featured', [\App\Http\Controllers\Api\ArticleController::class, 'featured']);
Route::get('/api/articles/titles-images', [\App\Http\Controllers\Api\ArticleController::class, 'titlesAndImages']);
Route::get('/api/articles/{slug}', [\App\Http\Controllers\Api\ArticleController::class, 'show']);

// News
Route::get('/api/news', [\App\Http\Controllers\Api\NewsController::class, 'index']);
Route::get('/api/news/{slug}', [\App\Http\Controllers\Api\NewsController::class, 'show']);

require __DIR__.'/auth.php';
