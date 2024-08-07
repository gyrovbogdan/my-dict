<?php


use App\Http\Controllers\Api\ArticleDictionaryController;
use App\Http\Controllers\Api\UserDictionaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TranslateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn() => auth()->user());
});
Route::resource('dictionary', UserDictionaryController::class);
Route::resource('articles.dictionary', ArticleDictionaryController::class);
Route::get('/translate', [TranslateController::class, 'index']);
