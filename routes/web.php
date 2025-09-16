<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

// Homepage → list of posts
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog
Route::prefix('blog')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [PostController::class, 'show'])->name('blog.show');
});

// Categories
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Tags
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');

// Comments (store only)
Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
