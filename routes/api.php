<?php

use App\Http\Controllers\AdvertisementController;
use App\Models\Keyword;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AdvertisementController::class)
    ->prefix('/advertisements/')
    ->name('advertisements.')
    ->group(function () {
        Route::get('keywords', 'keywords')->name('keywords');
        Route::get('', 'index')->name('index');
        Route::get('{advertisement}', 'show')->name('show');
        Route::get('{advertisement}/img', 'img')->name('img');
    });
