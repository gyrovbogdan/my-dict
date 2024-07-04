<?php

use App\Http\Controllers\Web\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

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

Auth::routes();

Route::middleware('auth:sanctum')->
    get('/', [HomeController::class, 'index'])->name('home');

Route::resource('article', ArticleController::class);