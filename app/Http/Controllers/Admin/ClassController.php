<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    //all class
    public function allClass(){
        $classes = Clas::orderBy('id','desc')->get();
        return view('admin.class.class_all',compact('classes'));
    }//end method

    //add class
    public function addClass(){
        return view('admin.class.class_add');
    }//end method


    //store class
    public function storeClass(Request $request){
        $request->validate([
            'class_name' => 'required|unique:clas'
        ]);

        //insert class
        Clas::insert([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('admin.all.class')->with('message','Class Created Successfully');
    }//end method

    //delete class
    public function deleteClass($id){
        $class = Clas::find($id);
        $class->sections()->delete();
        $class->delete();
        return redirect()->route('admin.all.class')->with('message','Class Deleted Successfully');
    }//end method

    //edit class
    public function editClass($id){
        $class= Clas::find($id);
        return view('admin.class.class_edit',compact('class'));
    }//end method


    //update class
    public function updateClass(Request $request){
        $request->validate([
            'class_name' => 'required|unique:clas,class_name,'.$request->id,
        ]);
        Clas::find($request->id)->update([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('admin.all.class')->with('message','Class Updated Successfully');
    }//end method
}//end method
