<?php

namespace App\Http\Controllers;

use App\email;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmailController extends Controller
{
    public function index(){
        $emails=email::paginate(8);
        return view('Admin.Emails.emails',compact('emails'));
    }
    public function store(Request $request){
        $this->validate($request,['name'=>'required|email']);
        $email=new email();
        $email->name=$request->input('name');
        if($email->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $this->validate($request,['name'=>'required']);
        $email=email::find($id);
        $email->name=$request->input('name');
        if($email->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $email=email::find($id);
        if($email->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
}
