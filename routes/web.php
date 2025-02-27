<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\NotificationController;

use Inertia\Inertia;



Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('users.destroy');

//webhook
Route::get('/webhook', [PostController::class, 'webhook'])->name('posts.index');

// Email Sent
Route::get('/registration', [EmailController::class, 'registration'])->name('registration');
Route::get('/email-verify/{token}', [EmailController::class, 'emailVerify'])->name('email-verify');


Route::prefix('notification')->group(function () {
    Route::get('/sent', [NotificationController::class, 'sent'])->name('notification.sent');
    Route::get('/count', [NotificationController::class, 'count'])->name('notification.count');
    Route::get('/registration', [NotificationController::class, 'registration'])->name('notification.registration');
    Route::get('/verify', [NotificationController::class, 'verify'])->name('notification.verify');
});



Route::inertia('/test', 'Test');






