<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Clas;
use App\Models\Section;
use App\Models\Student;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //all student
    public function allStudent(){
        $students = Student::orderBy('id','desc')->get();
        return view('admin.student.student_all',compact('students'));
    }//end method


    //add student form
    public function addStudent(){
         $classes = Clas::all();
         $sections = Section::all();
         $sessions = SessionModel::all();
         return view('admin.student.student_add',compact('classes','sections','sessions','sessions'));
    }//end method


    //ajax for section auto select
    public function sectionAutoSelect($class_id){
        $sections = Section::where('clas_id',$class_id)->get();
        return json_encode($sections);
    }//end method


    //store student
    public function storeStudent(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'session_id' => 'required',
             'name' => 'required',
             'father_name' => 'required',
              'mother_name' =>'required',
              'roll' => 'required',
              'registration' => 'required',
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
        $student->section_id = $request->section_id;
        $student->session_id = $request->session_id;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->roll = $request->roll;
        $student->registration = $request->registration;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->status = 1;
        $student->image = $request->image ? $image_path : '';
        $student->birth_certificate = $request->birth_certificate ? $certificate_path : '';
        $student->save();
        return redirect()->route('admin.all.student')->with('message','Student Added Successfully');
    }//end method


    //edit student form
    public function editStudent($id){
        $student = Student::find($id);
        $classes = Clas::all();
        $selected_class = Clas::where('id',$student->clas_id)->first();
        $sections = Section::where('clas_id',  $selected_class->id)->get();
        $sessions = SessionModel::all();
        return view('admin.student.student_edit',compact('student','classes','selected_class','sections','sessions'));
    }//end method


    //update student
    public function updateStudent(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'session_id' => 'required',
             'name' => 'required',
             'father_name' => 'required',
              'mother_name' =>'required',
              'roll' => 'required',
              'registration' => 'required',
              'email' => 'required|unique:students,email,'.$request->id,
              'phone' => 'required|unique:students,phone,'.$request->id,
              'present_address'=>'required',
              'permanent_address'=> 'required',
        ],[
            'clas_id.required'=>'The class field is required.',
            'session_id.required'=>'The session field is required.'
        ]);

        $student = Student::find($request->id);

        //student image upload
        if($request->file('image')){

            if(File::exists($student->image)){
                unlink($student->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/student_images/'.$imageName);
            $image_path = 'upload/student_images/'.$imageName;
            $student->image = $image_path;
        }

        //birth certificate image upload
        if($request->file('birth_certificate')){
            if(File::exists($student->birth_certificate)){
                unlink($student->birth_certificate);
            }
            $photo = $request->file('birth_certificate');
            $photoName = rand().'.'.$photo->getClientOriginalName();
            Image::make($photo)->resize(620,620)->save('upload/student_images/'.$photoName);
            $certificate_path = 'upload/student_images/'.$photoName;
            $student->birth_certificate = $certificate_path;
        }

        $student->clas_id = $request->clas_id;
        $student->section_id = $request->section_id;
        $student->session_id = $request->session_id;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->roll = $request->roll;
        $student->registration = $request->registration;
        $student->phone = $request->phone;
        $student->email = $request->email;
        if($request->password){
            $student->password = bcrypt($request->password);
        }

        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->save();
        return redirect()->route('admin.all.student')->with('message','Student Updated Successfully');
    }//end method


    //delete student
    public function deleteStudent($id){
        $student = Student::find($id);
        if(File::exists($student->image)){
            unlink($student->image);
        }

        if(File::exists($student->birth_certificate)){
            unlink($student->birth_certificate);
        }

        $student->delete();

        return redirect()->route('admin.all.student')->with('message','Student Deleted Successfully');
    }//end method
}//end class
