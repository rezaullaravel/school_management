<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MarkController extends Controller
{
    //mark assign
    public function index(Request $request){
        $classes = Clas::all();
        $class_id = $request->clas_id;
        $subject_id = $request->subject_id;
        if(!empty($request->clas_id && $request->section_id)){
            $students = Student::where('clas_id', $class_id)->where('section_id',$request->section_id)->get();

            // $students->appends(['clas_id' => $class_id, 'section_id' => $request->section_id,'subject_id'=>$subject_id]);
        }

        if(empty($request->section_id)){
            $students = Student::where('clas_id', $class_id)->get();
            // $students->appends(['clas_id' => $class_id,'subject_id'=>$subject_id]);
        }


        $sections = Section::where('clas_id', $class_id)->get();
        $section_id = $request->section_id;
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();
        return view('admin.mark.mark_assign',compact('classes','class_id','subject_id','students','sections','subjects','section_id','exams','sessions'));
    }//end method


    //mark insert
    public function insert(Request $request){
        $student_ids = $request->input('student_id');
    $marks = $request->input('mark');
    $class_id = $request->input('clas_id'); // Fetch the class ID
    $section_id = $request->input('section_id'); // Fetch the class ID
    $subject_id = $request->input('subject_id');
    $exam_id = $request->exam_id;
    $session_id = $request->session_id;


    // Ensure $class_id is a single value, not an array

        foreach ($student_ids as $key => $student_id) {
            $check = Mark::where('subject_id',$subject_id)->where('clas_id', $class_id)->where('student_id', $student_id)->first();
            if($check){
                $mark = $check;
            $mark->student_id = $student_id;
            $mark->mark = $marks[$key];
            $mark->clas_id = $class_id;
            if(!empty($section_id)){
                $mark->section_id = $section_id;
            }
            $mark->subject_id = $subject_id;
            $mark->exam_id = $exam_id;
            $mark->session_id = $session_id;

            }else{
                $mark = new Mark();
                $mark->student_id = $student_id;
                $mark->mark = $marks[$key];
                $mark->clas_id = $class_id;
                if(!empty($section_id)){
                    $mark->section_id = $section_id;
                }
                $mark->subject_id = $subject_id;
                $mark->exam_id = $exam_id;
                $mark->session_id = $session_id;
            }

            $mark->save();
        }


        return redirect()->back()->with('message','Mark assigned successfully');
    }//end method


    //result view
    public function viewResult(){
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('admin.result.result_view',compact('classes','sessions','exams'));
    }//end method


    //result get from database
    public function getResult(Request $request){
        $student = Student::where('roll',$request->roll)->first();
        if($student){
            $marks = Mark::where('student_id', $student->id)->where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->where('exam_id',$request->exam_id)->get();

            $exam = Exam::where('id',$request->exam_id)->first();

            if(!empty($marks)){
                return view('admin.result.result_final',compact('marks','student','exam'));
            }else{
                return redirect()->back()->with('sms','Something went wrong....Please try again');
            }
        }else{
            return redirect()->back()->with('sms','Something went wrong....Please try again');
        }


    }//end method


    //modify result
    public function modifyResult(){
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('admin.result.result_modify',compact('classes','sessions','exams'));
    }//end method


    //get result for modify
    public function getResultForModify(Request $request){
        $student = Student::where('roll',$request->roll)->first();
        if($student){
            $marks = Mark::where('student_id', $student->id)->where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->where('exam_id',$request->exam_id)->get();

            $exam = Exam::where('id',$request->exam_id)->first();

            if(!empty($marks)){
                return view('admin.result.result_view_modify',compact('marks','student','exam'));
            }else{
                return redirect()->back()->with('sms','Something went wrong....Please try again');
            }
        }else{
            return redirect()->back()->with('sms','Something went wrong....Please try again');
        }
    }//end method


    //edit result
    public function editResult($id,Request $request){
        $mark = Mark::find($id);
           // Capture the previous URL
           $previousUrl = $request->session()->get('previousUrl', url()->previous());

           // Store it in the session
           $request->session()->put('previousUrl', $previousUrl);
        return view('admin.result.result_edit',compact('mark'));
    }//end method


    //update result
    public function updateResult(Request $request){
        $mark = Mark::find($request->id);
        $mark->mark = $request->mark;
        $mark->save();
        return redirect(Session::get('previousUrl'))->with('message','Result Updated Successfully');
    }//end method

    //delete result
    public function deleteResult($id){
        Mark::find($id)->delete();
        return redirect(Session::get('previousUrl'))->with('message','Data Deleted Successfully');
    }//end method
}//end class
