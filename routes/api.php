<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\MeController;
use Illuminate\Support\Facades\Auth;
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
// Auth::loginUsingId(18);
// Auth::routes();

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [MeController::class, '__invoke']);

    //cash
    Route::prefix('cash')->group(function () {
        Route::get('', [CashController::class, 'index']);
        Route::post('create', [CashController::class, 'store']);
        Route::get('{cash:slug}', [CashController::class, 'show']);
    });
});
