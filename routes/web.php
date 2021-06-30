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

// front side routes
Route::get('/', 'front\FrontController@index')->name('front.home');
Route::get('/about-us', 'front\FrontController@index')->name('front.about-us');
Route::get('/resources', 'front\FrontController@resources')->name('front.resources');
Route::get('/how-it-works', 'front\FrontController@howItWorks')->name('front.how-it-works');
Route::get('/categories', 'front\FrontController@categories')->name('front.categories');
Route::get('/knowledge-bank', 'front\FrontController@knowledgeBank')->name('front.knowledge-bank');
Route::get('/directory', 'front\FrontController@directory')->name('front.directory');
Route::get('/experts', 'front\FrontController@experts')->name('front.experts');
Route::get('/articles', 'front\FrontController@articles')->name('front.articles');
Route::get('/sign-up', 'front\FrontController@signUp')->name('front.sign-up');



// auth routes
Auth::routes(['logout'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::any('logout','HomeController@logout')->name('logout');

// Common Auth Routes
Route::group(['middleware' => 'auth'],function(){
	Route::get('user/profile','HomeController@userProfile')->name('user.profile');
	Route::post('user/profile','HomeController@userProfileSave')->name('user.profile.save');
	// Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
	Route::post('user/change/password','HomeController@updateUserPassword')->name('user.changepassword.save');
	Route::get('user/points','HomeController@userPoints')->name('user.points');
});

// Stripe Payment Route
Route::get('payment/card-detils', 'StripePaymentController@stripeView')->name('payement.page');
Route::post('stripe/payment/form_submit','StripePaymentController@stripePostForm_Submit')->name('stripe.payment.form_submit');
Route::get('payment/successfull/thankyou/{stripeTransactionId}','StripePaymentController@thankyouStripePayment')->name('payment.successfull.thankyou');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	require 'custom/admin.php';
});

Route::group(['prefix'=>'teacher','middleware'=>'teacher'],function(){
	require 'custom/teacher.php';
});

Route::group(['prefix'=>'student','middleware'=>'student'],function(){
	require 'custom/student.php';
});