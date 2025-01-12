<?php

use App\Http\Controllers\admin\article\ArticleController;
use App\Http\Controllers\admin\test\TestController;
use App\Http\Controllers\Admin\users\AdminController;
use App\Http\Controllers\frontend\home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::get('/admin', function () {
    return view('admin.home.index');
});

// create Admins
Route::controller(AdminController::class)->prefix('admin')->group(function(){
    Route::get('/show', 'index')->name('admins.show');
    Route::get('/create', 'create')->name('admins.create');
    Route::post('/store', 'store')->name('admins.store');
    Route::get('/delete/{id}', 'destroy')->name('admins.delete');
    Route::post('/status/{id}', 'statusAdmin')->name('admins.status');
});
// create Moderators
Route::controller(AdminController::class)->prefix('moderator')->group(function(){
    Route::get('/show', 'ModeratorIndex')->name('moderators.show');
    Route::get('/create', 'ModeratorCreate')->name('moderators.create');
    Route::post('/store', 'ModeratorStore')->name('moderators.store');
    Route::get('/delete/{id}', 'ModeratorDestroy')->name('moderators.delete');
});
// create articles
Route::controller(ArticleController::class)->prefix('article')->group(function(){
    Route::get('/', 'index')->name('articles.index');
    Route::get('/create', 'create')->name('articles.create');
    Route::post('/store', 'store')->name('articles.store');
    Route::post('/edit/{articleId}', 'edit')->name('articles.edit');
    Route::put('/update/{articleId}', 'update')->name('articles.update');
    Route::get('/delete/{articleId}', 'delete')->name('articles.delete');
});
// create tests
Route::controller(TestController::class)->prefix('test')->group(function(){
    Route::get('/', 'index')->name('test.index');
    Route::get('/create', 'create')->name('test.create');
    Route::post('/store', 'store')->name('test.store');
    Route::get('/edit/{TestId}', 'edit')->name('test.edit');
    Route::put('/update/{TestId}', 'update')->name('test.update');
    Route::post('/delete/{TestId}', 'delete')->name('test.delete');
});