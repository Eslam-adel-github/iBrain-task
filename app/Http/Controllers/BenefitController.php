<?php

namespace App\Http\Controllers;

use App\benefit;
use App\flat;
use App\flat_benefits;
use App\out_benefits;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
    public function index(){
        $data=benefit::orderBy("id","desc")->paginate(8);
        return view('Admin.Benefits.benefits',compact('data'));
    }
    public function store(Request $request){
        $description=$request->input("description");
        $money_to_pay=$request->input("money_to_pay");
        $date_to_pay=$request->input("date_to_pay");
        $type=$request->input("type");
        $flat_type=$request->input("flat_type");
        if($type==0){
            session()->flash("inserted","من فضلك حدد نوع الاستحقاق");
            return redirect()->back();
        }
        if ($flat_type==2)
        {
            $flat_id = $request->input("flat_id");
            if (count($flat_id) == 0) {
                session()->flash("inserted", "من فضلك حدد الشقق التي عليها استحقاق");
                return redirect()->back();
            }
        }
        $benefits=new benefit();
        $benefits->description=$description;
        $benefits->money_to_pay=$money_to_pay;
        $benefits->date_to_pay=$date_to_pay;
        $benefits->type=$type;
        $benefits->save();
        if($flat_type==1){
            $flat=flat::all();
            foreach ($flat as$key=>$value){
                $flat_benfits=new flat_benefits();
                $flat_benfits->flat_id=$value->id;
                $flat_benfits->benefits_id=$benefits->id;
                $flat_benfits->save();
            }
        }
        elseif ($flat_type==2)
        {
            $flat_id = $request->input("flat_id");
            if (count($flat_id) > 0)
            {
                foreach ($flat_id as$key=>$value)
                {
                    $flat_benfits=new flat_benefits();
                    $flat_benfits->flat_id=$value;
                    $flat_benfits->benefits_id=$benefits->id;
                    $flat_benfits->save();
                }
            }
        }
        session()->flash("inserted","تم الحفظ بنجاح");
        return redirect()->back();

    }
    public function show_flat($id){
        $data=DB::table('flat_benefits')
            ->leftJoin('benefits', 'benefits.id', '=', 'flat_benefits.benefits_id')
            ->leftJoin('flats', 'flats.id', '=', 'flat_benefits.flat_id')
            ->where("flat_benefits.benefits_id","=" ,$id)
            ->select("flat_benefits.*","flat_benefits.id as id","benefits.*","flats.*","flat_benefits.id as id")
            ->paginate(15);
        return view('Admin.Flat.flat_benefits',compact('data'));
    }
    public function update_benefit_flat($id,Request $request){
        $type=$request->input("pay_status");
        $flat=flat_benefits::find($id);
        $flat->type1=$type;
        //echo $request->input("pay_status");
        if($flat->save()) {

            session()->flash("inserted", "تم الحفظ بنجاح");
            return redirect()->back();
        }

    }
    public function show_flat_benefits($id)
    {
        $data=DB::table('flat_benefits')
            ->leftJoin('benefits', 'benefits.id', '=', 'flat_benefits.benefits_id')
            ->leftJoin('flats', 'flats.id', '=', 'flat_benefits.flat_id')
            ->where("flat_benefits.flat_id","=" ,$id)
            ->select("flat_benefits.*","flat_benefits.id as id","benefits.*","flats.*","flat_benefits.id as id")
            ->paginate(15);
        return view('Admin.Flat.flat_benefits',compact('data'));
    }
    public function show_flat_not_pay()
    {
        $data=DB::table('flat_benefits')
            ->leftJoin('benefits', 'benefits.id', '=', 'flat_benefits.benefits_id')
            ->leftJoin('flats', 'flats.id', '=', 'flat_benefits.flat_id')
            ->where("flat_benefits.type1","=" ,0)
            ->select("flat_benefits.*","flat_benefits.id as id","benefits.*","flats.*","flat_benefits.id as id")
            ->paginate(15);
        return view('Admin.Flat.flat_benefits',compact('data'));
    }
    public function balance_now(Request $request){
        $benefits=benefit::all();
        $sum=0;
        foreach ($benefits as$key=>$value)
        {
           $counts=count(flat_benefits::where("type1",1)->where("benefits_id",$value->id)->get());
           //echo $counts;
           $sum=$sum+($counts*$value->money_to_pay);
        }
        $pay=out_benefits::sum("money");
        //echo $pay;
        return view('Admin.Benefits.show_report',compact('sum','pay'));
    }
}
