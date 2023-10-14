<?php

use App\Http\Controllers\Admin\BoosicianController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\BraintreeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//musician route
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/home', [BoosicianController::class, 'index'])->name('home');
    Route::get('/musicians/{musician}/create_sponsor', [BoosicianController::class, 'createSponsor'])->name('createSponsor');
    Route::post('/musicians/{musician}/store_sponsor', [BoosicianController::class, 'storeSponsor'])->name('storeSponsor');
    Route::resource('/musicians', BoosicianController::class);
});

//messages route
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/messages', MessagesController::class);
});

//reviews route
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('/reviews', ReviewsController::class);
});


//statistics route
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
});


Route::get('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');
Route::post('/payment', [BraintreeController::class, 'payment'])->name('payment')->middleware('auth');


Route::get('/admin/payments/braintree', [BraintreeController::class, 'show'])->name('admin.payments.braintree');


