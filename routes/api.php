<?php

use App\Http\Controllers\V1\Analytics\ProductController as AnalyticsProductController;
use App\Http\Controllers\V1\Auth\AuthController;
use App\Http\Controllers\V1\Products\ProductController;
use App\Http\Controllers\V1\Sells\SellController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name("auth.login");
});
Route::middleware(['jwt.verify'])->group(function () {
    Route::apiResource("/products",ProductController::class);
    Route::post("sell",[SellController::class, 'sell']);
    Route::prefix("/analytics")->group(function(){
        Route::get("most_sold", [AnalyticsProductController::class,'mostSold']);
        Route::get("higher_stock", [AnalyticsProductController::class,'higherStock']);
    });
});
