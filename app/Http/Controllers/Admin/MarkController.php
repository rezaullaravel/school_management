<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkController extends Controller
{
    //mark assign
    public function index(Request $request){
        $classes = Clas::all();
        $class_id = $request->clas_id;
        $subject_id = $request->subject_id;
        $students = Student::where('clas_id', $class_id)->get();
        return view('admin.mark.mark_assign',compact('classes','class_id','subject_id','students'));
    }//end method


    //mark insert
    public function insert(Request $request){
        $student_ids = $request->input('student_id');
    $marks = $request->input('mark');
    $class_id = $request->input('clas_id'); // Fetch the class ID
    $subject_id = $request->input('subject_id');

    // Ensure $class_id is a single value, not an array

        foreach ($student_ids as $key => $student_id) {
            $check = Mark::where('subject_id',$subject_id)->where('clas_id', $class_id)->where('student_id', $student_id)->first();
            if($check){
                $mark = $check;
            $mark->student_id = $student_id;
            $mark->mark = $marks[$key];
            $mark->clas_id = $class_id;
            $mark->subject_id = $subject_id;
            }else{
                $mark = new Mark();
                $mark->student_id = $student_id;
                $mark->mark = $marks[$key];
                $mark->clas_id = $class_id;
                $mark->subject_id = $subject_id;
            }

            $mark->save();
        }


        return redirect()->back()->with('message','Mark assigned successfully');
    }//end method
}
