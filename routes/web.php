<?php

use App\Http\Controllers\ArticleRevisionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArticleController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');

    Route::prefix('articles')->group(function () {
        Route::get('{article}/revisions', [ArticleRevisionController::class, 'index'])
            ->name('articles.revisions.index');

        Route::get('{article}/revisions/{revision}', [ArticleRevisionController::class, 'show'])
            ->name('articles.revisions.show');

        Route::post('{article}/revisions/{revision}/revert', [ArticleRevisionController::class, 'revert'])
            ->name('articles.revisions.revert');   
    });
});