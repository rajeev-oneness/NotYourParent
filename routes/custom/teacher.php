<?php

    namespace App\Http\Controllers\teacher;
    use Illuminate\Support\Facades\Route;

Route::get('dashboard',function(){
		return view('teacher.dashboard');
	})->name('teacher.dashboard');

    Route::group(['prefix' => 'my-course'], function() {
        // here goes the course routes
        Route::get('/',[MyCourseControler::class, 'index'])->name('teacher.my-course.index');
        // Route::get('/add',[CourseController::class, 'create'])->name('teacher.my-course.add');
        // Route::post('/store',[CourseController::class, 'store'])->name('teacher.my-course.store');
        // Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('teacher.my-course.edit');
        // Route::put('/update/{id}',[CourseController::class, 'update'])->name('teacher.my-course.update');
        // Route::get('/delete/{id}',[CourseController::class, 'destroy'])->name('teacher.my-course.delete');
    });
    Route::group(['prefix' => 'my-slot'], function() {
        // here goes the slot routes
        Route::get('/list',[TeacherController::class, 'allSlots'])->name('teacher.my-slots.list');
        Route::get('/',[TeacherController::class, 'index'])->name('teacher.my-slot.index');
        Route::post('/add',[TeacherController::class, 'create'])->name('teacher.my-slot.add');
        // Route::post('/store',[CourseController::class, 'store'])->name('teacher.my-course.store');
        // Route::get('/edit/{id}',[CourseController::class, 'edit'])->name('teacher.my-course.edit');
        Route::post('/update/{id}',[TeacherController::class, 'updateSlot'])->name('teacher.my-slot.update');
        Route::get('/delete/{id}',[TeacherController::class, 'deleteSlot'])->name('teacher.my-slot.delete');
    });

?>
