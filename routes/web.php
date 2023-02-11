<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TourController;
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

Route::controller(TourController::class)->group(function () {
    Route::get('/{name?}', 'index')->where('name', 'tours')->name('tours.index');
    Route::get('/tours/{slug}', 'show')->name('tours.show');
});

Route::controller(BookingController::class)->group(function () {
    Route::post('/bookings/store', 'store')->name('bookings.store');
});

// set app locale route
Route::get('language/{locale}', [LanguageController::class, 'index'])->name('language.index');
