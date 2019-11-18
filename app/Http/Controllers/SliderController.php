<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;

use App\Http\Requests;

class SliderController extends Controller
{
    public function index()
    {
        $slider=slider::paginate(8);
        return view('Admin.Slider.slider',compact('slider'));
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image'=>'required|image',
            ]);
        $slider=new slider();
        $slider->name_en=$request->input('name_en');
        $slider->name_ar=$request->input('name_ar');
        $slider->description_en=$request->input('description_en');
        $slider->description_ar=$request->input('description_ar');
        if($request->file('image') !=null)
        {
            $filname=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('slider',$filname);
            $slider->image=$filname;
        }
        if($slider->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $slider=slider::find($id);
        $slider->name_ar=$request->input('name_ar');
        $slider->name_en=$request->input('name_en');
        $slider->description_en=$request->input('description_en');
        $slider->description_ar=$request->input('description_ar');
        if($request->file('image')!=null){
            $filname=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('slider',$filname);
            $slider->image=$filname;
        }
        if($slider->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $slider=slider::find($id);
        if($slider->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
}
