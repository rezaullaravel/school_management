<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionController extends Controller
{
    //admission applicant list
    public function admissionApplicantList(){
        $applicants = Student::where('status',0)->get();
        return view('admin.admission.applicant_list',compact('applicants'));
    }//end method


    //accept application
    public function acceptAppllication($id){
        $application = Student::find($id);
        $application->status = 1;
        $application->save();
        return redirect()->back()->with('message','The applicant is now our student');
    }//end method
}//end main
