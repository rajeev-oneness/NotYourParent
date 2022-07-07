<?php

namespace App\Http\Controllers\teacher;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',function(){
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::group(['prefix' => 'my-course'], function() {
    // here goes the course routes
    Route::get('/',[MyCourseControler::class, 'index'])->name('teacher.my-course.index');
    Route::get('/add',[MyCourseControler::class, 'create'])->name('teacher.my-course.add');
    Route::post('/store',[MyCourseControler::class, 'store'])->name('teacher.my-course.store');
    Route::get('/edit/{id}',[MyCourseControler::class, 'edit'])->name('teacher.my-course.edit');
    Route::put('/update/{id}',[MyCourseControler::class, 'update'])->name('teacher.my-course.update');
    Route::get('/delete/{id}',[MyCourseControler::class, 'destroy'])->name('teacher.my-course.delete');
});

Route::group(['prefix' => 'my-slot'], function() {
    // here goes the slot routes
    Route::get('/list',[TeacherController::class, 'allSlots'])->name('teacher.my-slots.list');
    Route::get('/slotlist',[TeacherController::class, 'slotList'])->name('teacher.my-slots.slotList');
    Route::get('/',[TeacherController::class, 'index'])->name('teacher.my-slot.index');
    Route::get('/single/{date}', [TeacherController::class,'getSingle'])->name('teacher.my-slot.single');
    Route::post('/update/{date}',[TeacherController::class, 'updateSlot'])->name('teacher.my-slot.update');
    Route::get('/delete/{id}',[TeacherController::class, 'deleteSlot'])->name('teacher.my-slot.delete');
});

// Route::group(['prefix' => 'chat'], function() {
//     Route::get('/', [TeacherController::class, 'chatIndex'])->name('teacher.chat.index');
//     // Route::get('/{id}', [TeacherController::class, 'single'])->name('teacher.chat.single');
//     Route::post('/', [TeacherController::class, 'create'])->name('teacher.chat.create');
//     Route::post('/new', [TeacherController::class, 'new'])->name('teacher.chat.new');
// });

Route::group(['prefix' => 'knowledgebank'], function() {
    Route::get('/',[TeacherController::class, 'knowledgeBankIndex'])->name('teacher.knowledgebank.index');
    Route::get('/add',[TeacherController::class, 'knowledgeBankCreate'])->name('teacher.knowledgebank.add');
    Route::post('/store',[TeacherController::class, 'knowledgeBankStore'])->name('teacher.knowledgebank.store');
    Route::get('/edit/{id}',[TeacherController::class, 'knowledgeBankEdit'])->name('teacher.knowledgebank.edit');
    Route::put('/update/{id}',[TeacherController::class, 'knowledgeBankUpdate'])->name('teacher.knowledgebank.update');
    Route::get('/delete/{id}',[TeacherController::class, 'knowledgeBankDestroy'])->name('teacher.knowledgebank.delete');
});


// job post
Route::group(['prefix' => 'jobcat'], function() {
    Route::get('/',[JobCategoryController::class, 'index'])->name('front.jobcat.index');
    Route::get('/add',[JobCategoryController::class, 'create'])->name('front.jobcat.add');
    Route::post('/store',[JobCategoryController::class, 'store'])->name('front.jobcat.store');
    Route::get('/edit/{id}',[JobCategoryController::class, 'edit'])->name('front.jobcat.edit');
    Route::put('/update/{id}',[JobCategoryController::class, 'update'])->name('front.jobcat.update');
    Route::get('/delete/{id}',[JobCategoryController::class, 'destroy'])->name('front.jobcat.delete');

});
Route::group(['prefix' => 'job'], function() {
    Route::get('/',[JobController::class, 'index'])->name('front.job.index');
    Route::get('/add',[JobController::class, 'create'])->name('front.job.add');
    Route::post('/store',[JobController::class, 'store'])->name('front.job.store');
    Route::get('/edit/{id}',[JobController::class, 'edit'])->name('front.job.edit');
    Route::put('/update/{id}',[JobController::class, 'update'])->name('front.job.update');
    Route::get('/delete/{id}',[JobController::class, 'destroy'])->name('front.job.delete');

});

