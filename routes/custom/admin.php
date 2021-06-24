<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseController;

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
        // here goes the article routes
        Route::get('/',[CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/add',[CategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/store',[CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{id}',[CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('admin.category.delete');
    });
    Route::group(['prefix' => 'course'], function() {
        // here goes the article routes
        Route::get('/',[CourseController::class, 'index'])->name('admin.course.index');
        Route::get('/add',[CourseController::class, 'create'])->name('admin.course.add');
        Route::post('/store',[CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('admin.course.edit');
        Route::put('/update/{id}',[CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/delete/{id}',[CourseController::class, 'destroy'])->name('admin.course.delete');
    });
?>

