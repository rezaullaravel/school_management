<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    //teacher login form
    public function teacherLoginForm(){

        if(Session::get('teacherId')){
            return redirect()->route('teacher.dashboard');
        } elseif(Session::get('adminId')){
            return redirect('/admin/dashboard');
        } elseif(Session::get('studentId')){
            return redirect()->route('student.dashboard');
        } else{
            return view('teacher.teacher_login');
        }
    }//end method


    //teacher post login
    public function teacherPostLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $teacher = Teacher::where('email',$request->email)->first();
        if($teacher){
           if(password_verify($request->password,$teacher->password)){
             $teacherId = $teacher->id;
             Session::put('teacherId',$teacherId);
             return redirect()->route('teacher.dashboard');
           }else{
            return redirect()->back()->with('message','The given password is incorrect.');
           }
        }else{
            return redirect()->back()->with('message','You have no login access.');
        }
    }//end method


    //teacher dashboard
    public function teacherDashboard(){
        return view('teacher.teacher_dashboard');
    }//end method


    //teacher logout
    public function teacherLogout(){
        //Session::forget('teacherId');
        Session::flush();
        return redirect('/');
    }//end method
}//end method
