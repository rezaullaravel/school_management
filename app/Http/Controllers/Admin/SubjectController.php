<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    //all subject
    public function allSubject(){
        $subjects = Subject::orderBy('id','desc')->get();
        return view('admin.subject.subject_all',compact('subjects'));
    }//end method


    //add subject
    public function addSubject(){
        return view('admin.subject.subject_add');
    }//end method


    //store subject
    public function storeSubject(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects'
        ],[
            'subject.required'=>'The subject name is required.',
        ]);

        $subject = new Subject();
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('admin.all.subject')->with('message','Subject Added Successfully');
    }//end method


    //delete subject
    public function deleteSubject($id){
        Subject::find($id)->delete();
        return redirect()->route('admin.all.subject')->with('message','Subject Deleted Successfully');
    }//end method


    //edit subject
    public function editSubject($id){
        $subject = Subject::find($id);
        return view('admin.subject.subject_edit',compact('subject'));
    }//end method


    //update subject
    public function updateSubject(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects,subject,'.$request->id,
        ],[
            'subject.required'=>'The subject name is required.',
        ]);
        $subject = Subject::find($request->id);
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('admin.all.subject')->with('message','Subject Updated Successfully');
    }//end method
}//end main
