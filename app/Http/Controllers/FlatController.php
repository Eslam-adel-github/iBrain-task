<?php

namespace App\Http\Controllers;

use App\flat;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class FlatController extends Controller
{
    public function index(){
        $data=flat::paginate(8);
        return view('Admin.Flat.flat',compact('data'));
    }
    public function store(Request $request){
        $validation=Validator::make($request->all(),
            [
                'flat_number'=>'required|unique:flats',
                'owner_name'=>'required',
            ]);
        if($validation->fails())
        {
            session()->flash("inserted","يجب عدم تكرار رقم الشقة اعد الادخال مرة اخري");
            return redirect()->back();
        }
        $data=new flat();
        $data->flat_number=$request->input('flat_number');
        $data->owner_name=$request->input('owner_name');
        if($data->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $validation=Validator::make($request->all(),
            [
                'flat_number'=>'required',
                'owner_name'=>'required',
            ]);

        $data=flat::find($id);
        $data->flat_number=$request->input('flat_number');
        $data->owner_name=$request->input('owner_name');
        if($data->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $data=flat::find($id);
        if($data->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }

}
