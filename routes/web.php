<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\teacher\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// auth routes
Auth::routes(['logout' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::any('logout', [HomeController::class, 'logout'])->name('logout');

// front side routes

Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/about-us', [FrontController::class, 'index'])->name('front.about-us');
Route::get('/resources', [FrontController::class, 'resources'])->name('front.resources');
Route::get('/how-it-works', [FrontController::class, 'howItWorks'])->name('front.how-it-works');
Route::get('/categories', [FrontController::class, 'categories'])->name('front.categories');
Route::get('/categories/{id}', [FrontController::class, 'categoryWiseCourses'])->name('front.categories.course');
Route::get('/knowledge-bank', [FrontController::class, 'knowledgeBank'])->name('front.knowledge-bank');

Route::get('/experts', [FrontController::class, 'experts'])->name('front.experts');
Route::get('/experts/{expertId}', [FrontController::class, 'expertsSingle'])->name('front.experts.single');
Route::get('/experts/{expertId}/{currentDate}', [FrontController::class, 'expertsDates'])->name('front.experts.dates');
Route::get('/articles', [FrontController::class, 'articles'])->name('front.articles');
Route::get('/articles/{articleId}', [FrontController::class, 'articleSingle'])->name('front.articles.single');
Route::get('/sign-up', [FrontController::class, 'signUp'])->name('front.sign-up');
Route::get('/singleDate/{expertId}/{date}', [FrontController::class, 'getSingleDate'])->name('front.my-slot.single');
Route::get('/courses', [FrontController::class, 'courses'])->name('front.courses');
Route::get('/course/{courseId}', [FrontController::class, 'coursesSingle'])->name('front.courses.single');

Route::get('/privacy-policy', [FrontController::class, 'privacyPolicyIndex'])->name('front.privacyPolicy');
Route::get('/terms-and-conditions', [FrontController::class, 'termsAndConditionsIndex'])->name('front.termsAndConditions');

// search routes
Route::get('/search', [FrontController::class, 'homeExpertSearch'])->name('front.search.expert');
// Route::get('/directory', [FrontController::class,'directory'])->name('front.directory');

// STRIPE PAYMENT
Route::post('stripe/payment', [PaymentController::class, 'storeStripePayment'])->name('stripe.payment.store');

// payment
Route::get('/payment/session/{slotId?}', [PaymentController::class, 'videoSession'])->name('payment.session.video');
Route::get('/payment/case/{courseId?}', [PaymentController::class, 'caseStudy'])->name('payment.casestudy');
Route::get('/order-response', [PaymentController::class, 'orderSuccess'])->name('front.purchase.success');

// Common Auth Routes
Route::group(['middleware' => 'auth'], function () {
	Route::get('user/profile', [HomeController::class, 'userProfile'])->name('user.profile');
	Route::post('user/profile', [HomeController::class, 'userProfileSave'])->name('user.profile.save');
	// Route::get('user/change/password','HomeController@changePassword')->name('user.changepassword');
	Route::post('user/change/password', [HomeController::class, 'updateUserPassword'])->name('user.changepassword.save');
	Route::get('user/points', [HomeController::class, 'userPoints'])->name('user.points');

	Route::get('user/status', [HomeController::class, 'userStatus'])->name('user.status');
	Route::put('user/status/save', [HomeController::class, 'userStatusSave'])->name('user.status.save');

	Route::get('user/profile/language', [HomeController::class, 'userLanguage'])->name('user.language.index');
	Route::put('user/profile/language/save', [HomeController::class, 'userLanguageSave'])->name('user.language.save');
	Route::get('user/profile/language/delete/{id}', [HomeController::class, 'userLanguageDelete'])->name('user.language.delete');

	Route::get('user/profile/topics', [HomeController::class, 'userTopics'])->name('user.topics.index');
	Route::put('user/profile/topic/save', [HomeController::class, 'userTopicSave'])->name('user.topic.save');
	Route::get('user/profile/topic/delete/{id}', [HomeController::class, 'userTopicDelete'])->name('user.topic.delete');

	Route::get('user/profile/address', [HomeController::class, 'userAddress'])->name('user.address.index');
	Route::get('user/profile/address/new', [HomeController::class, 'userAddressCreate'])->name('user.address.new');
	Route::post('user/profile/address/save', [HomeController::class, 'userAddressSave'])->name('user.address.save');
	Route::get('user/profile/address/edit', [HomeController::class, 'userAddressEdit'])->name('user.address.edit');
	Route::put('user/profile/address/update', [HomeController::class, 'userAddressUpdate'])->name('user.address.update');

	// purchase reports
	Route::group(['prefix' => 'user/report'], function () {
		Route::get('transaction', [HomeController::class, 'transactionIndex'])->name('user.transactions.index');
		Route::get('session', [HomeController::class, 'sessionsIndex'])->name('user.sessions.index');
		Route::get('case-study', [HomeController::class, 'caseStudyReport'])->name('user.caseStudy.index');
	});

	// chat
	Route::group(['prefix' => 'user/chat'], function () {
		Route::get('/', [TeacherController::class, 'chatIndex'])->name('user.chat.index');
		// Route::get('/{id}', [TeacherController::class, 'single'])->name('teacher.chat.single');
		Route::post('/', [TeacherController::class, 'create'])->name('user.chat.create');
		Route::post('/new', [TeacherController::class, 'new'])->name('user.chat.new');
	});

	// notification read
	Route::post('/read', [HomeController::class, 'readIndex'])->name('user.notification.read');

	Route::get('/payment', function () {
		return view('front.payment');
	});
});

// Stripe Payment Route
Route::get('payment/card-detils', [StripePaymentController::class, 'stripeView'])->name('payement.page');

Route::post('/stripe/payment/form_submit', [StripePaymentController::class, 'stripePostForm_Submit'])->name('stripe.payment.form_submit');

Route::get('payment/successfull/thankyou/{stripeTransactionId}', [StripePaymentController::class, 'thankyouStripePayment'])->name('payment.successfull.thankyou');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
	require 'custom/admin.php';
});

Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
	require 'custom/teacher.php';
});

Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
	require 'custom/student.php';
});
