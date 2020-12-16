<?php

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

Route::get('/', function () {
    return view('offer');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/offertest', [App\Http\Controllers\OfferController::class, 'index']);

Route::get('/offer/create', [App\Http\Controllers\OfferController::class, 'create']);

Route::post('offer/create', [App\Http\Controllers\OfferController::class, 'store']);
