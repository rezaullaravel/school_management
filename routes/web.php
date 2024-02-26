<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//=========================== admin all route=========================
Route::get('/admin/login',[AdminController::class,'adminLoginForm']);
Route::post('/admin-login',[AdminController::class,'adminPostLogin'])->name('admin.post.login');

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');

    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');

    //class
    Route::get('/class/all',[ClassController::class,'allClass'])->name('admin.all.class');
    Route::get('/class/add',[ClassController::class,'addClass'])->name('admin.add.class');
    Route::post('/class/store',[ClassController::class,'storeClass'])->name('admin.store.class');
    Route::get('/class/delete/{id}',[ClassController::class,'deleteClass'])->name('admin.delete.class');
    Route::get('/class/edit/{id}',[ClassController::class,'editClass'])->name('admin.edit.class');
    Route::post('/class/update',[ClassController::class,'updateClass'])->name('admin.update.class');

    //section
    Route::get('/section/all',[SectionController::class,'allSection'])->name('admin.all.section');
    Route::get('/section/add',[SectionController::class,'addSection'])->name('admin.add.section');
    Route::post('/section/store',[SectionController::class,'storeSection'])->name('admin.store.section');
    Route::get('/section/delete/{id}',[SectionController::class,'deleteSection'])->name('admin.delete.section');
    Route::get('/section/edit/{id}',[SectionController::class,'editSection'])->name('admin.edit.section');
    Route::post('/section/update',[SectionController::class,'updateSection'])->name('admin.update.section');
});
//=========================== admin all route end=========================

/*===========================Teacher all route===========================*/
Route::get('/teacher/login',[TeacherController::class,'teacherLoginForm']);
Route::post('/teacher-login',[TeacherController::class,'teacherPostLogin'])->name('teacher.post.login');

Route::middleware(['teacher'])->group(function () {
    Route::get('/teacher/dashboard',[TeacherController::class,'teacherDashboard'])->name('teacher.dashboard');
    Route::get('/teacher/logout',[TeacherController::class,'teacherLogout'])->name('teacher.logout');
});
/*===========================Teacher all route end===========================*/
