<?php

use App\Http\Controllers\Api\ApiBraintreeController;
use App\Http\Controllers\Api\ApiMessageController;
use App\Http\Controllers\Api\ApiReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MusicianController as ApiMusicianController;

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

Route::get('/musicians',[ApiMusicianController::class,'index'])->name('api.musicians.index');
Route::get('/musicians/{id}',[ApiMusicianController::class,'show'])->name('api.musicias.show');


Route::post('/review-form', [ ApiReviewController::class, 'store'])->name('api.review-form');
Route::post('/contact-form', [ ApiMessageController::class, 'store'])->name('api.contact-form');

//Route::get('/user',[ApiMusicianController::class,'user'])->name('api.musicians.user');
//Route::get('/instrument',[ApiMusicianController::class,'instrument'])->name('api.musicians.instrument');
//Route::get('/review',[ApiMusicianController::class,'review'])->name('api.musicians.review');

