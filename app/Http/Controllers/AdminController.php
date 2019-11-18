<?php

namespace App\Http\Controllers;

use App\branches;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function home()
    {
        return view('Admin.Home.home');
    }
    public function add_branch(){
        return view("Admin.Branch.add");
    }
    public function store(Request $request){
        $address=$request->input("address");
        $lat=$request->input("lat");
        $lang=$request->input("lang");
        $new_branch=new branches();
        $new_branch->address=$address;
        $new_branch->lat=$lat;
        $new_branch->lang=$lang;
        $new_branch->save();
        session()->flash("inserted","تم الاضافة بنجاح");
        return redirect()->back();
    }
    public function get_all_branch(){
        $branches=branches::where("id",">",0)->get(["address","lat","lang"]);
        return response()->json(['code' => '200', 'status' => "success", 'branches' => $branches], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }
}
