<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route,Auth;

	Route::get('dashboard',function(){
		return view('student.dashboard');
	})->name('home');
?>