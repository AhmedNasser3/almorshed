<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\twitterApi\TwitterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// twitter api
Route::post('/twitter/post', [TwitterController::class, 'postTweet']);
Route::get('/twitter/tweets', [TwitterController::class, 'getTweets']);
Route::post('/tweet', [TwitterController::class, 'postTweet']);