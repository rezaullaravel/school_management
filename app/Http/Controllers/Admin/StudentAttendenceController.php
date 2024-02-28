<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Http\Controllers\Controller;

class StudentAttendenceController extends Controller
{
    //student attendence
    public function index(Request $request){
        $classes = Clas::all();
        $class = $request->clas_id;
        $date =  $request->date;
        $class_name = Clas::where('id',$class)->first();
        $students = Student::where('clas_id', $class)->get();
        return view('admin.attendence.student_attendence',compact('classes','class','date','students','class_name'));
    }//end method


    //insert attendence
    public function insertAttendence(Request $request){
        $check = StudentAttendence::where('clas_id',$request->class_id)->where('student_id',$request->student_id)->where('date',$request->date)->first();

        if($check){
            $attendence = $check;
            $attendence->attendence_type=$request->attendence_type;
        }else{
            $attendence = new StudentAttendence();
            $attendence->clas_id=$request->class_id;
            $attendence->student_id=$request->student_id;
            $attendence->attendence_type=$request->attendence_type;
            $attendence->date=$request->date;
        }


        $attendence->save();

    //     $json['message']='saved successfully';
    //    echo json_encode($json);
    return response()->json([
        'sms'=>'Attendence saved successfully',
    ]);


    }//end method


}//end class