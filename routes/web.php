<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, '__invoke']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [IndexController::class, '__invoke']);
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [CategoryIndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('/', [StoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [ShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [EditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [UpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function () {
        Route::get('/', [TagIndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('/create', [TagCreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('/', [TagStoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [TagShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagEditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagUpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagDeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        Route::get('/', [PostIndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('/create', [PostCreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('/', [PostStoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [PostShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostEditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [PostUpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [PostDeleteController::class, '__invoke'])->name('admin.post.delete');
    });
});

Auth::routes();
