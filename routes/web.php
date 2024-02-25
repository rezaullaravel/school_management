<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AdminController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
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
