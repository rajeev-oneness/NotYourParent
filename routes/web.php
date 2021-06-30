<?php

namespace App\Http\Controllers;
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Route,Auth;

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

// front side routes

Route::get('/', [FrontController::class,'index'])->name('front.home');
Route::get('/about-us', [FrontController::class,'index'])->name('front.about-us');
Route::get('/resources', [FrontController::class,'resources'])->name('front.resources');
Route::get('/how-it-works', [FrontController::class,'howItWorks'])->name('front.how-it-works');
Route::get('/categories', [FrontController::class,'categories'])->name('front.categories');
Route::get('/knowledge-bank', [FrontController::class,'knowledgeBank'])->name('front.knowledge-bank');
Route::get('/directory', [FrontController::class,'directory'])->name('front.directory');
Route::get('/experts', [FrontController::class,'experts'])->name('front.experts');
Route::get('/articles', [FrontController::class,'articles'])->name('front.articles');
Route::get('/sign-up', [FrontController::class,'signUp'])->name('front.sign-up');



// auth routes
Auth::routes(['logout'=>false]);

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::any('logout', [HomeController::class,'logout'])->name('logout');

// Common Auth Routes
Route::group(['middleware' => 'auth'],function(){
	Route::get('user/profile', [HomeController::class,'userProfile'])->name('user.profile');

	Route::post('user/profile', [HomeController::class,'userProfileSave'])->name('user.profile.save');
	
	// Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
	Route::post('user/change/password', [HomeController::class,'updateUserPassword'])->name('user.changepassword.save');
	
	Route::get('user/points', [HomeController::class,'userPoints'])->name('user.points');

});

// Stripe Payment Route
Route::get('payment/card-detils', [StripePaymentController::class,'stripeView'])->name('payement.page');

Route::post('/stripe/payment/form_submit', [StripePaymentController::class,'stripePostForm_Submit'])->name('stripe.payment.form_submit');

Route::get('payment/successfull/thankyou/{stripeTransactionId}', [StripePaymentController::class,'thankyouStripePayment'])->name('payment.successfull.thankyou');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'custom/admin.php';
});

Route::group(['prefix'=>'teacher','middleware'=>'teacher'],function(){
	require 'custom/teacher.php';
});

Route::group(['prefix'=>'student','middleware'=>'student'],function(){
	require 'custom/student.php';
});