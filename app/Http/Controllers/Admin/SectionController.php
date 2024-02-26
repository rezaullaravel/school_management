<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    //all section
    public function allSection(){
        $sections = Section::orderBy('id','desc')->paginate(20);
        return view('admin.section.section_all',compact('sections'));
    }//end method

    //add section
    public function addSection(){
        $classes = Clas::all();
        return view('admin.section.section_add',compact('classes'));
    }//end method

    //store section
    public function storeSection(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'section_name' => 'required',
        ],[
            'clas_id.required' => 'The class field is required.'
        ]);

        Section::insert([
            'clas_id' => $request->clas_id,
            'section_name' => $request->section_name,
        ]);

        return redirect()->route('admin.all.section')->with('message','Section Created Successfully');
    }//end method


    //delete section
    public function deleteSection($id){
        Section::find($id)->delete();
        return redirect()->route('admin.all.section')->with('message','Section Deleted Successfully');
    }//end method


    //edit section
    public function editSection($id){
        $classes = Clas::all();
        $section =  Section::find($id);
        return view('admin.section.section_edit',compact('classes','section'));
    }//end method


    //update section
    public function updateSection(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'section_name' => 'required',
        ],[
            'clas_id.required' => 'The class field is required.'
        ]);

        Section::find($request->id)->update([
            'clas_id' => $request->clas_id,
            'section_name' => $request->section_name,
        ]);

        return redirect()->route('admin.all.section')->with('message','Section Updated Successfully');
    }//end method
}//end class
