<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\FrontPostController;
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



Route::get('/', [FrontPostController::class, 'allPublicPost'])->name('front_posts.all');
Route::get('/posts/all', [FrontPostController::class, 'allPublicPost'])->name('front_posts.all');
Route::get('/post/view/{post}', [FrontPostController::class, 'singlePost'])->name('front_posts.view');

Auth::routes(['register' => false]);
// Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('/users', UserController::class);
        Route::get('/posts/display/{post}', [PostController::class,'displayPost'])->name('posts.display');
        Route::post('/posts/image_upload', [PostController::class,'uploadImage'])->name('posts.image_upload');
        Route::post('/posts/change_status', [PostController::class,'changeStatus'])->name('posts.change_status');
        Route::resource('/posts', PostController::class);
    });
});


