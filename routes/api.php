<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Authenticate\RegisterController;
use App\Http\Controllers\API\Authenticate\SignInController;
use App\Http\Controllers\API\Authenticate\UserController;

use App\Http\Controllers\API\Categories\CategoryController;

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


Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('sign-in', SignInController::class)->name('sign-in');
    Route::post('register', RegisterController::class)->name('register');

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('user', UserController::class)->name('user-info');
    });
});

Route::get('categories', CategoryController::class)->name('categories');
