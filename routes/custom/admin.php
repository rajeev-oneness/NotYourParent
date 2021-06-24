<?php
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
?>