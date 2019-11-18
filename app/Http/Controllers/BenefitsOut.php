<?php

namespace App\Http\Controllers;

use App\benefit;
use App\flat_benefits;
use App\out_benefits;
use Illuminate\Http\Request;

use App\Http\Requests;

class BenefitsOut extends Controller
{
    public function index(){
        $data=out_benefits::orderBy("id","desc")->paginate(8);
        return view('Admin.Benefits_out.benefits_out',compact('data'));
    }
    public function store(Request $request){
        $description=$request->input("description");
        $who_take=$request->input("who_take");
        $money=$request->input("money");
        $benefits=benefit::all();
        $sum=0;
        foreach ($benefits as$key=>$value)
        {
            $counts=count(flat_benefits::where("type1",1)->where("benefits_id",$value->id)->get());
            //echo $counts;
            $sum=$sum+($counts*$value->money_to_pay);
        }
        if($sum<$money){
            session()->flash("inserted","لا يمكن الصرف لان المبلغ اكبر من الموجود");
            return redirect()->back();
        }
        $benefits=new out_benefits();
        $benefits->description=$description;
        $benefits->who_take=$who_take;
        $benefits->money=$money;
        $benefits->action_done=date("Y-m-d");
        $benefits->save();
        session()->flash("inserted","تم الحفظ بنجاح");
        return redirect()->back();
    }
    public function show_report(){
        return view('Admin.Benefits_out.benefits_out_report');
    }
    public function benefits_out_period_report(Request $request){
        $start=$request->input("start_date");
        $end=$request->input("end_date");
        $data=out_benefits::whereBetween('action_done', [$start, $end])->orderBy("id","desc")->paginate(8);
        return view('Admin.Benefits_out.benefits_out_report',compact('data'));
    }

}
