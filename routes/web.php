<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->whereNumber('post')->name('posts.show');
Route::get('/dashboard', fn () => redirect()->route('posts.index'))->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->whereNumber('post')->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->whereNumber('post')->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->whereNumber('post')->name('posts.destroy');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->whereNumber('post')->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->whereNumber('comment')->name('comments.destroy');
    Route::post('/posts/{post}/like', [ReactionController::class, 'likePost'])->whereNumber('post')->name('posts.like');
    Route::post('/posts/{post}/dislike', [ReactionController::class, 'dislikePost'])->whereNumber('post')->name('posts.dislike');
    Route::post('/comments/{comment}/like', [ReactionController::class, 'likeComment'])->whereNumber('comment')->name('comments.like');
    Route::post('/comments/{comment}/dislike', [ReactionController::class, 'dislikeComment'])->whereNumber('comment')->name('comments.dislike');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/role', [UserController::class, 'updateRole'])->whereNumber('user')->name('users.update-role');
});

require __DIR__.'/auth.php';
