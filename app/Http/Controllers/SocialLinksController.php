<?php

namespace App\Http\Controllers;

use App\sociallinks;
use Illuminate\Http\Request;

use App\Http\Requests;

class SocialLinksController extends Controller
{
    public function index()
    {
        $sociallinks=sociallinks::find(1);
        return view("Admin.SocialLinks.sociallinks",compact("sociallinks"));
    }
    public function update(Request $request)
    {
        $facebook=$request->input('facebook');
        $fiber=$request->input('fiber');
        $imo=$request->input('imo');
        $whats=$request->input('whats');
        $sociallinks=sociallinks::find(1);
        $sociallinks->facebook=$facebook;
        $sociallinks->fiber=$fiber;
        $sociallinks->imo=$imo;
        $sociallinks->whats=$whats;
        if($sociallinks->save())
        {
            session()->flash("inserted","تم التعديل بنجاح");
            return redirect()->back();
        }
    }
}
