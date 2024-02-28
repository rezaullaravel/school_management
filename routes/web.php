<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\StudentAttendenceController;

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

    //session
    Route::get('/session/all',[SessionController::class,'allSession'])->name('admin.all.session');
    Route::get('/session/add',[SessionController::class,'addSession'])->name('admin.add.session');
    Route::post('/session/store',[SessionController::class,'storeSession'])->name('admin.store.session');
    Route::get('/session/delete/{id}',[SessionController::class,'deleteSession'])->name('admin.delete.session');
    Route::get('/session/edit/{id}',[SessionController::class,'editSession'])->name('admin.edit.session');
    Route::post('/session/update',[SessionController::class,'updateSession'])->name('admin.update.session');

    //designation
    Route::get('/designation/all',[DesignationController::class,'allDesignation'])->name('admin.all.designation');
    Route::get('/designation/add',[DesignationController::class,'addDesignation'])->name('admin.add.designation');
    Route::post('/designation/store',[DesignationController::class,'storeDesignation'])->name('admin.store.designation');
    Route::get('/designation/delete/{id}',[DesignationController::class,'deleteDesignation'])->name('admin.delete.designation');
    Route::get('/designation/edit/{id}',[DesignationController::class,'editDesignation'])->name('admin.edit.designation');
    Route::post('/designation/update',[DesignationController::class,'updateDesignation'])->name('admin.update.designation');

    //student
    Route::get('/student/all',[StudentController::class,'allStudent'])->name('admin.all.student');
    Route::get('/student/add',[StudentController::class,'addStudent'])->name('admin.add.student');
    Route::post('/student/store',[StudentController::class,'storeStudent'])->name('admin.store.student');
    Route::get('/student/delete/{id}',[StudentController::class,'deleteStudent'])->name('admin.delete.student');
    Route::get('/student/edit/{id}',[StudentController::class,'editStudent'])->name('admin.edit.student');
    Route::post('/student/update',[StudentController::class,'updateStudent'])->name('admin.update.student');

    //global route
    //ajax for section auto select
    Route::get('/class/section/ajax/{class_id}',[StudentController::class,'sectionAutoSelect']);


    //student attendence
    Route::get('/attendence/student',[StudentAttendenceController::class,'index'])->name('admin.student.attendence');
    Route::get('/attendence/student/class',[StudentAttendenceController::class,'classWiseStudent'])->name('admin.student.attendence.class');
    Route::post('/attendence/student/insert',[StudentAttendenceController::class,'insertAttendence'])->name('admin.attendence.student.insert');
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
