<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TopicController;

Route::get('dashboard',function(){
		return view('admin.dashboard');
	})->name('home');

	// EXAMPLE OF PROPER ROUTING:
	// Route::group(['prefix' => 'article'], function() {
	// 	// here goes the article routes
	// 	Route::get('/')->name('admin.article.list');
	// 	Route::get('/add')->name('admin.article.add');
	// 	Route::get('/store')->name('admin.article.store');
	// 	Route::get('/edit')->name('admin.article.edit');
	// 	Route::get('/update')->name('admin.article.update');
	// 	Route::get('/delete')->name('admin.article.delete');
	// })
    // Route::get('/user/{id}', [UserController::class, 'show'])
    Route::group(['prefix' => 'article'], function() {
        // here goes the article routes
        Route::get('/',[ArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/add',[ArticleController::class, 'create'])->name('admin.article.add');
        Route::post('/store',[ArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/edit/{id}',[ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::put('/update/{id}',[ArticleController::class, 'update'])->name('admin.article.update');
        Route::get('/delete/{id}',[ArticleController::class, 'destroy'])->name('admin.article.delete');
    });
    Route::group(['prefix' => 'category'], function() {
        // here goes the category routes
        Route::get('/',[CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/add',[CategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/store',[CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('admin.category.delete');
    });
    Route::group(['prefix' => 'course'], function() {
        // here goes the course routes
        Route::get('/',[CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/add',[CourseController::class, 'create'])->name('admin.course.add');
        Route::post('/store',[CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('admin.course.edit');
        Route::put('/update/{id}',[CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/delete/{id}',[CourseController::class, 'destroy'])->name('admin.course.delete');
    });
    Route::group(['prefix' => 'contact-us'], function() {
        // here goes the contact-us routes
        Route::get('/',[AdminController::class, 'contactUs'])->name('admin.contactUs.index');
        Route::get('/edit/{id}',[AdminController::class, 'editContactUs'])->name('admin.contactUs.edit');
        Route::put('/update/{id}',[AdminController::class, 'updateContactUs'])->name('admin.contactUs.update');
    });
    Route::group(['prefix' => 'faq'], function() {
        // here goes the faq routes
        Route::get('/',[FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/add',[FaqController::class, 'create'])->name('admin.faq.add');
        Route::post('/store',[FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/edit/{id}',[FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::put('/update/{id}',[FaqController::class, 'update'])->name('admin.faq.update');
        Route::get('/delete/{id}',[FaqController::class, 'destroy'])->name('admin.faq.delete');
    });
    Route::group(['prefix' => 'topic'], function() {
        // here goes the topic routes
        Route::get('/',[TopicController::class, 'index'])->name('admin.topic.index');
        Route::get('/add',[TopicController::class, 'create'])->name('admin.topic.add');
        Route::post('/store',[TopicController::class, 'store'])->name('admin.topic.store');
        Route::get('/edit/{id}',[TopicController::class, 'edit'])->name('admin.topic.edit');
        Route::put('/update/{id}',[TopicController::class, 'update'])->name('admin.topic.update');
        Route::get('/delete/{id}',[TopicController::class, 'destroy'])->name('admin.topic.delete');
    });
    Route::group(['prefix' => 'testimonial'], function() {
        // here goes the testimonial routes
        Route::get('/',[TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('/add',[TestimonialController::class, 'create'])->name('admin.testimonial.add');
        Route::post('/store',[TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('/edit/{id}',[TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::put('/update/{id}',[TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::get('/delete/{id}',[TestimonialController::class, 'destroy'])->name('admin.testimonial.delete');
    });
?>

