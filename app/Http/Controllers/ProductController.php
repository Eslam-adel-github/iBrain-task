<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function index(){
        $products=product::orderBy('id','desc')->paginate(7);
        return view('Admin.Products.product',compact('products','category','producttosearch'));
    }
    public function store(Request $request){
        $this->validate($request,['name_ar'=>'required','name_en'=>'required']);
        // $product=new product();
        $name_ar=$request->input('name_ar');
        $name_en=$request->input('name_en');
        $categories_id=$request->input('categories_id');
        $description_ar=$request->input("description_ar");
        $description_en=$request->input("description_en");
        foreach ($name_ar as$key=>$value)
        {
            $product=new product();
            $product->name_ar=$name_ar[$key];
            $product->name_en=$name_en[$key];
            $product->categories_id=$categories_id[$key];
            $product->description_ar=$description_ar[$key];
            $product->description_en=$description_en[$key];
            $filename = time().$key . "." .$request->file("image")[$key]->getClientOriginalExtension();
            $request->file("image")[$key]->move("product", $filename);
            $product->image = $filename;
            $product->save();
        }
        session()->flash("inserted","تم الاضافة بنجاح");
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $this->validate($request,['name_ar'=>'required','name_en'=>'required']);
        $product=product::find($id);
        $product->name_ar=$request->input('name_ar');
        $product->name_en=$request->input('name_en');
        $product->categories_id=$request->input('categories_id');
        $product->description_ar=$request->input("description_ar");
        $product->description_en=$request->input("description_en");
        if($request->file('image') !=null)
        {
            $filename=time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move("product",$filename);
            $product->image=$filename;
        }
        if($product->save())
        {
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
    public function delete($id){
        $product=product::find($id);
        if($product->delete()){
            session()->flash("inserted","تم المسح بنجاح");
            return redirect()->back();
        }
    }
    public function showform()
    {
        $category=category::all();
        return view('Admin.Products.add',compact('category'));
    }
    public function increaseproductadd()
    {
        $category=category::all();
        $view=view("Admin.Products.increaseproduct",compact('category'))->render();
        return response()->json($view);
    }
    public function searchbyproduct(Request $request)
    {
        $id=$request->input("id");
        $products=product::where('id',$id)->paginate(8);
        // $view=view("Admin.products.singleproduct",compact('products','category'))->render();
        return view("Admin.Products.products",compact('products'));
    }
    public function searchbyproductcategory(Request $request)
    {
        $id=$request->input("id");
        $products=product::where('categories_id',$id)->paginate(8);
        $productcategory=product::where('categories_id',$id)->get();
        // $view=view("Admin.products.singleproduct",compact('products','category'))->render();

        return view("Admin.Products.productsearch",compact('products','productcategory'));
    }
}
