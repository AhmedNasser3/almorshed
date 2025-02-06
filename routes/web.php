<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\seo\SeoController;
use App\Http\Controllers\Admin\chat\ChatController;
use App\Http\Controllers\Admin\test\TestController;
use App\Http\Controllers\Admin\users\AdminController;
use App\Http\Controllers\frontend\home\HomeController;
use App\Http\Controllers\Admin\review\ReviewController;
use App\Http\Controllers\Admin\tiktok\TikTokController;
use App\Http\Controllers\Admin\article\ArticleController;
use App\Http\Controllers\Admin\service\ServiceController;
use App\Http\Controllers\Admin\doctorService\DoctorServiceController;

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
// services
Route::get('/service/{ServicesId}/view-service', [HomeController::class, 'services'])->name('service.view');
Route::controller(ServiceController::class)->prefix('service')->name('service')->group(function(){
    Route::get('/create','create')->name('.create');
    Route::post('/store',action: 'store')->name('.store');
    Route::put('/update/{service}',action: 'update')->name('.update');
    Route::get('/delete/{service}',action: 'delete')->name('.delete');
});
// chat
Route::controller(ChatController::class)->prefix('chat')->group(function(){
    Route::get('/{UserId}', 'view')->name('chat.view');
});
// seo Admin
Route::controller(SeoController::class)->prefix('seo')->group(function(){
    Route::get('/','index')->name('seo.index');
    Route::get('/create','create')->name('seo.create');
    Route::post('/store','store')->name('seo.store');
    Route::get('/edit/{seoId}',action: 'edit')->name('seo.edit');
    Route::get('/update/{seoId}','update')->name('seo.update');
    Route::get('/delete/{seoId}','delete')->name('seo.delete');
});
// admin reservation
Route::controller(DoctorServiceController::class)->prefix('doctor-service')->name('doctor-service')->group(function(){
    Route::get('/create', 'create')->name('.create');
    Route::post('/store', 'store')->name('.store');
});
// seo tik tok
Route::get('/tiktok/login', [TikTokController::class, 'redirectToTikTok'])->name('tiktok.login');
Route::get('/tiktok/callback', [TikTokController::class, 'handleCallback']);
Route::get('/tiktok/videos', [TikTokController::class, 'getUserVideos'])->name('tiktok.videos');
Route::post('/reviews/{doctor_id}', [ReviewController::class, 'store'])->name('reviews.store');
// reserve
Route::get('/reserve/{ServicesId}',[HomeController::class, 'reserve'])->name('reserve.page');