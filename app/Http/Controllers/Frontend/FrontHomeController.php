<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Clas;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\Student;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class FrontHomeController extends Controller
{
    //home page
    public function index(){
        return view('frontend.index');
    }//end method


    //student result search page
    public function result(){
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('frontend.result.result',compact('classes','sessions','exams'));
    }//end method


    //student result show page
    public function getStudentResult(Request $request){
        $student = Student::where('roll',$request->roll)->first();
        if($student){
            $marks = Mark::where('student_id', $student->id)->where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->where('exam_id',$request->exam_id)->get();

            $exam = Exam::where('id',$request->exam_id)->first();

            if(!empty($marks)){
                return view('frontend.result.result_show',compact('marks','student','exam'));
            }else{
                return redirect()->back()->with('sms','Something went wrong....Please try again');
            }
        }else{
            return redirect()->back()->with('sms','Something went wrong....Please try again');
        }
    }//end method


    //student admission form
    public function studentAdmissionForm(){
        $classes = Clas::all();
         $sections = Section::all();
         $sessions = SessionModel::all();
         return view('frontend.admission.admission_form',compact('classes','sections','sessions','sessions'));
    }//end method


    //store student admission info
    public function storeAdmissionInfo(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'session_id' => 'required',
             'name' => 'required',
             'father_name' => 'required',
              'mother_name' =>'required',
              'password' => 'required|min:8',
              'email' => 'required|unique:students',
              'phone' => 'required|unique:students',
              'present_address'=>'required',
              'permanent_address'=> 'required',
        ],[
            'clas_id.required'=>'The class field is required.',
            'session_id.required'=>'The session field is required.'
        ]);

         //student image upload
         if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/student_images/'.$imageName);
            $image_path = 'upload/student_images/'.$imageName;
        }

        //birth certificate image upload
        if($request->file('birth_certificate')){
            $photo = $request->file('birth_certificate');
            $photoName = rand().'.'.$photo->getClientOriginalName();
            Image::make($photo)->resize(620,620)->save('upload/student_images/'.$photoName);
            $certificate_path = 'upload/student_images/'.$photoName;
        }

        $student = new Student();
        $student->clas_id = $request->clas_id;

        $student->session_id = $request->session_id;

       if($request->section_id){
        $student->section_id = $request->section_id;
       }
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->status = 0;
        $student->image = $request->image ? $image_path : '';
        $student->birth_certificate = $request->birth_certificate ? $certificate_path : '';
        $student->save();

        return redirect()->back()->with('sms','Your application has been submitted successfully');
    }//end method
}//end main
