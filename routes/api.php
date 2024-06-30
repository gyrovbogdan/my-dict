<?php


use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DictionaryController;
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

Route::middleware('auth:sanctum')->resource('dictionary', DictionaryController::class);

Route::get('/article/{article}', [ArticleController::class, 'show']);
Route::get('/translate', [TranslateController::class, 'index']);
