<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    //all designation
    public function allDesignation(){
        $designations = Designation::orderBy('id','desc')->get();
        return view('admin.designation.designation_all',compact('designations'));
    }//end method


    //add designation
    public function addDesignation(){
        return view('admin.designation.designation_add');
    }//end method


    //store designation
    public function storeDesignation(Request $request){
        $request->validate([
            'designation' => 'required|unique:designations',
        ]);

        Designation::insert([
            'designation' => $request->designation,
        ]);

        return redirect()->route('admin.all.designation')->with('message','Designation Created Successfully');
    }//end method


    //delete designation
    public function deleteDesignation($id){
        Designation::find($id)->delete();
        return redirect()->route('admin.all.designation')->with('message','Designation Deleted Successfully');
    }//end method


    //edit designation
    public function editDesignation($id){
        $designation = Designation::find($id);
        return view('admin.designation.designation_edit',compact('designation'));
    }//end method


    //update designation
    public function updateDesignation(Request $request){
        $request->validate([
            'designation' => 'required|unique:designations,designation,'.$request->id,
        ]);

        Designation::find($request->id)->update([
            'designation' => $request->designation,
        ]);

        return redirect()->route('admin.all.designation')->with('message','Designation Updated Successfully');
    }//end method
}//end class
