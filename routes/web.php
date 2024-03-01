<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\MarkController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Admin\StudentAttendenceController;





//global route
    //ajax for section auto select
    Route::get('admin/class/section/ajax/{class_id}',[StudentController::class,'sectionAutoSelect']);

    //ajax for subject auto select
    Route::get('admin/getSubjects/{class_id}/{section_id}',[StudentController::class,'subjectAutoSelect']);


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


    //student attendence
    Route::get('/attendence/student',[StudentAttendenceController::class,'index'])->name('admin.student.attendence');
    Route::get('/attendence/student/class',[StudentAttendenceController::class,'classWiseStudent'])->name('admin.student.attendence.class');
    Route::post('/attendence/student/insert',[StudentAttendenceController::class,'insertAttendence'])->name('admin.attendence.student.insert');
    Route::get('/attendence/student/report',[StudentAttendenceController::class,'studentAttendenceReport'])->name('admin.student.attendence.report');
    Route::get('/attendence/student/{id}',[StudentAttendenceController::class,'editStudentAttendenceReport'])->name('admin.attendence.student.edit');
    Route::post('/attendence/student/update',[StudentAttendenceController::class,'updateStudentAttendenceReport'])->name('admin.attendence.student.update');


    //mark assign to student
    Route::get('/mark/assign',[MarkController::class,'index'])->name('admin.mark.assign');
    Route::post('/mark/insert',[MarkController::class,'insert'])->name('admin.mark.insert');


    //result get
    Route::get('/result/view',[MarkController::class,'viewResult'])->name('admin.result.view');
    Route::get('/result/get',[MarkController::class,'getResult'])->name('admin.get-result');
    Route::get('/result/modify',[MarkController::class,'modifyResult'])->name('admin.result.modify');
    Route::get('/result/view-modify',[MarkController::class,'getResultForModify'])->name('admin.modify-result');
    Route::get('/result/edit/{id}',[MarkController::class,'editResult'])->name('admin.result.edit');
    Route::post('/result/update',[MarkController::class,'updateResult'])->name('admin.update.result');
    Route::get('/result/delete/{id}',[MarkController::class,'deleteResult'])->name('admin.result.delete');


    //subject
    Route::get('/subject/all',[SubjectController::class,'allSubject'])->name('admin.all.subject');
    Route::get('/subject/add',[SubjectController::class,'addSubject'])->name('admin.add.subject');
    Route::post('/subject/store',[SubjectController::class,'storeSubject'])->name('admin.store.subject');
    Route::get('/subject/delete/{id}',[SubjectController::class,'deleteSubject'])->name('admin.delete.subject');
    Route::get('/subject/edit/{id}',[SubjectController::class,'editSubject'])->name('admin.edit.subject');
    Route::post('/subject/update',[SubjectController::class,'updateSubject'])->name('admin.update.subject');


    //exam
    Route::get('/exam/all',[ExamController::class,'allExam'])->name('admin.all.exam');
    Route::get('/exam/add',[ExamController::class,'addExam'])->name('admin.add.exam');
    Route::post('/exam/store',[ExamController::class,'storeExam'])->name('admin.store.exam');
    Route::get('/exam/delete/{id}',[ExamController::class,'deleteExam'])->name('admin.delete.exam');
    Route::get('/exam/edit/{id}',[ExamController::class,'editExam'])->name('admin.edit.exam');
    Route::post('/exam/update',[ExamController::class,'updateExam'])->name('admin.update.exam');


    //admin addmission
    Route::get('/admission/student',[AdmissionController::class,'admissionApplicantList'])->name('admin.admission.student');

    //accept application
    Route::get('/accept/application/{id}',[AdmissionController::class,'acceptAppllication'])->name('admin.accept.application');
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


/*===================student all route start ====================  */
Route::get('/student/login',[StudentAuthController::class,'studentLoginForm'])->name('student.login');
Route::get('/student/register',[StudentAuthController::class,'studentRegisterForm'])->name('student.register');
Route::post('/student/post-login',[StudentAuthController::class,'studentPostLogin'])->name('student.post.login');



Route::middleware(['student'])->group(function(){
    Route::get('/student/dashboard',[StudentAuthController::class,'studentDashboard'])->name('student.dashboard');
    Route::get('/student/logout',[StudentAuthController::class,'studentLogout'])->name('student.logout');
});
/*===================student all route end====================  */


/*===========================Frontend all route================================ */
//home page
Route::get('/',[FrontHomeController::class,'index']);

//result
Route::get('/student/result',[FrontHomeController::class,'result'])->name('student.result');
Route::get('/student-result/show',[FrontHomeController::class,'getStudentResult'])->name('student.get-result');

//admission
Route::get('/student/admission',[FrontHomeController::class,'studentAdmissionForm'])->name('student.admission');
Route::post('/store/admission/info',[FrontHomeController::class,'storeAdmissionInfo'])->name('store.admission.info');
/*===========================Frontend all route end ================================ */
