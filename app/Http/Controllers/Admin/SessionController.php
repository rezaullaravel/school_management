<?php

namespace App\Http\Controllers\Admin;

use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    //all session
    public function allSession(){
        $sessions = SessionModel::orderBy('id','desc')->get();
        return view('admin.session.session_all',compact('sessions'));
    }//end method


    //add session
    public function addSession(){
        return view('admin.session.session_add');
    }//end method

    //store session
    public function storeSession(Request $request){
        $request->validate([
            'session_year' => 'required',
        ]);

        SessionModel::insert([
            'session_year' => $request->session_year,
        ]);

        return redirect()->route('admin.all.session')->with('message','Session Created Successfully');
    }//end method

    //delete session
    public function deleteSession($id){
        SessionModel::find($id)->delete();
        return redirect()->route('admin.all.session')->with('message','Session Deleted Successfully');
    }//end method


    //edit session
    public function editSession($id){
        $session =  SessionModel::find($id);
        return view('admin.session.session_edit',compact('session'));
    }//end method


    //update session
    public function updateSession(Request $request){
        $request->validate([
            'session_year' => 'required',
        ]);

        SessionModel::find($request->id)->update([
            'session_year' => $request->session_year,
        ]);

        return redirect()->route('admin.all.session')->with('message','Session Updated Successfully');
    }//end method
}//end class
