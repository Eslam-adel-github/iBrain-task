<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function index()
    {
        $category=category::paginate(8);
        return view('Admin.Category.category',compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name_en'=>'required',
                'name_ar'=>'required',
                'image'=>'required|image',
            ]);
        $category=new category();
        $category->name_en=$request->input('name_en');
        $category->name_ar=$request->input('name_ar');
        if($request->file('image') !=null)
        {
            $filname=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('category',$filname);
            $category->image=$filname;
        }
        if($category->save()){
            session()->flash("inserted","تم الاضافة بنجاح");
            return redirect()->back();
        }
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                'name_en'=>'required',
                'name_ar'=>'required',
            ]);
        $category=category::find($id);
        $category->name_ar=$request->input('name_ar');
        $category->name_en=$request->input('name_en');
        if($request->file('image')!=null){
            $filname=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('category',$filname);
            $category->image=$filname;
        }
        if($category->save()){
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $category=category::find($id);
        if($category->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
}
