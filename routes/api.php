<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ai-sale-off/submit', [App\Http\Controllers\API\PromotionController::class,'submitAISaleOff'] )->name('submit.ai');
// Route::get('/adworldconference50/submit', [App\Http\Controllers\API\PromotionController::class,'submitPromotion'] )->name('submit.promotion');

Route::get('/services/blog/get-article-by-tag', [App\Http\Controllers\API\PostController::class,'getPostByTag']);

Route::get('/services/blog/get-article-by-category', [App\Http\Controllers\API\PostController::class,'getPostByCategory']);

Route::get('/services/blog/search-article', [App\Http\Controllers\API\PostController::class,'searchArticles']);

Route::get('/services/blog/recent-article', [App\Http\Controllers\API\PostController::class,'getMoreRecentArticles']);

Route::get('/services/glossary/get-terms', [App\Http\Controllers\API\GlossaryController::class, 'getTerms']);  