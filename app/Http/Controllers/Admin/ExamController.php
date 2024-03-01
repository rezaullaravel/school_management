<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    //all subject
    public function allExam(){
        $exams = Exam::all();
        return view('admin.exam.exam_all',compact('exams'));
    }//end method


    //add exam
    public function addExam(){
        return view('admin.exam.exam_add');
    }//end method


    //store exam
    public function storeExam(Request $request){
        $request->validate([
            'exam_name'=>'required|unique:exams',
        ],[
            'exam_name.required'=>'The exam name is required.'
        ]);

        $exam = new Exam();
        $exam->exam_name = $request->exam_name;
        $exam->save();
        return redirect()->route('admin.all.exam')->with('message','Exam added successfully');
    }//end method


    //delete exam
    public function deleteExam($id){
        Exam::find($id)->delete();
        return redirect()->route('admin.all.exam')->with('message','Exam deleted successfully');
    }//end method


    //edit exam
    public function editExam($id){
        $exam = Exam::find($id);
        return view('admin.exam.exam_edit',compact('exam'));
    }//end method


    //update exam
    public function updateExam(Request $request){
        $request->validate([
            'exam_name'=>'required|unique:exams,exam_name,'.$request->id,
        ],[
            'exam_name.required'=>'The exam name is required.'
        ]);

        $exam = Exam::find($request->id);
        $exam->exam_name = $request->exam_name;
        $exam->save();
        return redirect()->route('admin.all.exam')->with('message','Exam updated successfully');

    }//end method
}//end main
