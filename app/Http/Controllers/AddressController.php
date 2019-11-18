<?php

namespace App\Http\Controllers;

use App\address;
use Illuminate\Http\Request;

use App\Http\Requests;

class AddressController extends Controller
{
    public function index(){
        $adresses=address::paginate(8);
        return view('Admin.Addresses.address',compact('adresses'));
    }
    public function store(Request $request){
        $this->validate($request,['name'=>'required']);
        $address=new address();
        $address->name_ar=$request->input('name');
        $address->name_en=$request->input('name_en');
        $address->name_fr=$request->input('name_fr');
        if($address->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id){
        $this->validate($request,['name'=>'required']);
        $address=address::find($id);
        $address->name=$request->input('name');
        $address->name_en=$request->input('name_en');
        if($address->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $address=address::find($id);
        if($address->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
}
