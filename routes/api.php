<?php

use Illuminate\Http\Request;

namespace App\Http\Controllers;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/directory-ajax-call', 'front\FrontController@directorySearch')->name('directory.search.ajax');
Route::post('/directory-ajax-call', [FrontController::class,'directorySearch'])->name('directory.search.ajax');
Route::post('/get-slot-by-date', [FrontController::class,'getSlotByDate'])->name('get.slot.by.date');
Route::post('/search', [FrontController::class,'expertSearch'])->name('front.home.search');
Route::post('/job/save/toggle', [JobController::class, 'saveUserJob'])->name('user.job.save.toggle');