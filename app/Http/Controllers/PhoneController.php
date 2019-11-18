<?php

namespace App\Http\Controllers;

use App\phone;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhoneController extends Controller
{
    public function index(){
        $phones=phone::paginate(8);
        return view('Admin.Phones.phones',compact('phones'));
    }
    public function store(Request $request){
        $this->validate($request,['name'=>'required']);
        $phone=new phone();
        $phone->name=$request->input('name');
        if($phone->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $this->validate($request,['name'=>'required']);
        $phone=phone::find($id);
        $phone->name=$request->input('name');
        if($phone->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $phone=phone::find($id);
        if($phone->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
}
