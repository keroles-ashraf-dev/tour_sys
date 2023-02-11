<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\TourController;
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

Route::controller(TourController::class)->group(function () {
    Route::get('/tours', 'index');
});

Route::controller(BookingController::class)->group(function () {
    Route::post('/bookings/store', 'store');
});
