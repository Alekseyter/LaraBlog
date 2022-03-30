<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Personal\CommentController;
use App\Http\Controllers\Personal\LikeController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Blog\BlogController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [BlogController::class, 'index'])->name('blog');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/{post}', [BlogController::class, 'show'])->name('blog.show');

    Route::group(['prefix' => '{post}/comments'], function() {
        Route::post('/', [BlogController::class, 'store'])->name('blog.comment.store');
    });

    Route::group(['prefix' => '{post}/likes'], function() {
        Route::post('/', [BlogController::class, 'storeLike'])->name('blog.like.store');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/{category}', [BlogController::class, 'showCategory'])->name('blog.category.show');
    });
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user');
            // Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::patch( '/{user}', [UserController::class, 'update'] )->name('admin.user.update');
            Route::delete( '/{user}', [UserController::class, 'delete'] )->name('admin.user.delete');
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.post');
            Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('/{post}', [PostController::class, 'show'])->name('admin.post.show');
            Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::patch( '/{post}', [PostController::class, 'update'] )->name('admin.post.update');
            Route::delete( '/{post}', [PostController::class, 'delete'] )->name('admin.post.delete');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
            // Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::patch( '/{category}', [CategoryController::class, 'update'] )->name('admin.category.update');
            Route::delete( '/{category}', [CategoryController::class, 'delete'] )->name('admin.category.delete');
        });

        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', [TagController::class, 'index'])->name('admin.tag');
            // Route::get('create', [TagController::class, 'create'])->name('admin.tag.create');
            Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
            Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tag.show');
            Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
            Route::patch( '/{tag}', [TagController::class, 'update'] )->name('admin.tag.update');
            Route::delete( '/{tag}', [TagController::class, 'delete'] )->name('admin.tag.delete');
        });
});

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::get('/', [PersonalController::class, 'index'])->name('personal');

    Route::group(['prefix' => 'likes'], function () {
        Route::get('/', [LikeController::class, 'index'])->name('personal.like');
        Route::delete('/{post}', [LikeController::class, 'delete'])->name('personal.like.delete');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', [CommentController::class, 'index'])->name('personal.comment');
        Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('personal.comment.edit');
        Route::patch('/{comment}', [CommentController::class, 'update'])->name('personal.comment.update');
        Route::delete('/{comment}', [CommentController::class, 'delete'])->name('personal.comment.delete');
    });

});

Auth::routes();
