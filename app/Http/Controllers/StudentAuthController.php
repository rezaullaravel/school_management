<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentAuthController extends Controller
{
    //student login form
    public function studentLoginForm(){


        if(Session::get('studentId')){
            return redirect()->route('student.dashboard');
        } elseif(Session::get('adminId')){
            return redirect('/admin/dashboard');
        } elseif(Session::get('teacherId')){
            return redirect()->route('teacher.dashboard');
        } else{
            return view('student.student_login');
        }
    }//end method


    //student register form
    public function studentRegisterForm(){
        return view('student.student_register');
    }//end method


    //student post login
    public function studentPostLogin(Request $request){
        $student = Student::where('email',$request->email)->first();
        if($student && $student->status==1){
           if(password_verify($request->password,$student->password)){
             $studentId = $student->id;
             Session::put('studentId',$studentId);
             return redirect()->route('student.dashboard');
           }else{
            return redirect()->back()->with('sms','The given password is incorrect.');
           }
        }else{
            return redirect()->back()->with('sms','You have no login access.');
        }
    }//end method


    //student dashboard
    public function studentDashboard(){
        return view('student.student_dashboard');
    }//end method


    //student logout
    public function studentLogout(){
        Session::flush();
        return redirect('/');
    }//end method
}//end method
