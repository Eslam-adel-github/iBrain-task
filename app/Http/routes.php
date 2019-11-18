<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//Route::auth();

Route::get("insert_data_from_first_hotel",function (\Illuminate\Http\Request $request) {
        //address in database1 contain value of email and email contain value of address
         $page=$request->input("page")?$request->input("page"):1;
         set_time_limit(1800);
        $data=\Illuminate\Support\Facades\DB::connection('hotel1')->table("hotel1.hotels")
        ->select("hotel1.hotels.*")->paginate(10)->each(function ($quesry) {
                //to check if data  in hotel1 repeated in hotel2
            $counter_hotel1_in_hotel2 = count(\Illuminate\Support\Facades\DB::connection('hotel2')->table("hotels")
                ->where("hotels.hotel_address", $quesry->address)
                ->where("hotels.hotel_phoneNumber", $quesry->phoneNumber)
                ->get());

                //to check if data  in hotel1 repeated in hotel3
            $counter_hotel1_in_hotel3 = count(\Illuminate\Support\Facades\DB::connection('hotel3')->table("hotels")
                ->where("hotels.h_address", $quesry->address)
                ->where("hotels.h_phoneNumber", $quesry->phoneNumber)
                ->get());

            //to check if saved it before or not
            $counter_is_registered_before =count(\App\hotels::where("email", $quesry->address)
                ->where("hotels.phoneNumber", $quesry->phoneNumber)
                ->get());

                // if not save  before save it
                if (($counter_is_registered_before == 0)) {
                $hotel = new \App\hotels();
                $hotel->email = $quesry->address;
                $hotel->name = $quesry->name;
                $hotel->phoneNumber = $quesry->phoneNumber;
                $hotel->address = $quesry->email;
                $hotel->country = $quesry->country;
                $hotel->city = $quesry->city;
                $hotel->state = $quesry->state;
                $hotel->street_name = $quesry->street_name;
                $hotel->postcode = $quesry->postcode;
                $hotel->company = $quesry->company;
                $hotel->url = $quesry->url;
                $hotel->save();
            }
            //if repeated before in hotel1 or hotel2 make it in  repeated in new databse
            if (($counter_hotel1_in_hotel2 != 0) || ($counter_hotel1_in_hotel3 != 0)) {
                \App\hotels::where("email", $quesry->address)
                    ->where("hotels.phoneNumber", $quesry->phoneNumber)
                    ->update(["repeated" => 1]);
            }
        });
        // return response
        $array_to_show=array();
        $total_data=\Illuminate\Support\Facades\DB::connection('hotel1')->table("hotel1.hotels")->count();
        $array_to_show["status"]="sucess to insert data";
        $array_to_show["count_data"]=$total_data;
        $array_to_show["number_pages"]=ceil($total_data/10);
        $array_to_show["processing_in_every_page"]=10;
        $array_to_show["next_page"]=(ceil($total_data/10))>=$page+1?$page+1:1;
        $array_to_show["next_url"]=$request->url()."?page=".$array_to_show["next_page"];

    return response()->json($array_to_show);

});
/*second*/
Route::get("insert_data_from_second_hotel",function (\Illuminate\Http\Request $request) {

    //hotel_address in database2 contain value of email and hotel_email contain value of address

    $page=$request->input("page")?$request->input("page"):1;
    set_time_limit(1800);

    $data = \Illuminate\Support\Facades\DB::connection('hotel2')->table("hotels")
        ->select("hotel2.hotels.*")->paginate(10)->each(function ($quesry) {

            //to check if data in hotel2 repeated in hotel1
            $counter_hotel2_in_hotel1 = count(\Illuminate\Support\Facades\DB::connection('hotel1')->table("hotels")
                ->where("hotels.address", $quesry->hotel_address)
                ->where("hotels.phoneNumber", $quesry->hotel_phoneNumber)
                ->get());

            //to check if data in hotel2 repeated in hotel3
            $counter_hotel2_in_hotel3 = count(\Illuminate\Support\Facades\DB::connection('hotel3')->table("hotels")
                ->where("hotels.h_address", $quesry->hotel_address)
                ->where("hotels.h_phoneNumber", $quesry->hotel_phoneNumber)
                ->get());

            //to check if saved it before or not
            $counter_is_registered_before = \App\hotels::where("email", $quesry->hotel_address)
                ->where("phoneNumber", $quesry->hotel_phoneNumber)
                ->count();
            // if not save  before save it
            if (($counter_is_registered_before == 0)) {
                $hotel = new \App\hotels();
                $hotel->email = $quesry->hotel_address;
                $hotel->name = $quesry->hotel_name;
                $hotel->phoneNumber = $quesry->hotel_phoneNumber;
                $hotel->address = $quesry->hotel_email;
                $hotel->country = $quesry->hotel_country;
                $hotel->city = $quesry->hotel_city;
                $hotel->state = $quesry->hotel_state;
                $hotel->street_name = $quesry->hotel_street_name;
                $hotel->postcode = $quesry->hotel_postcode;
                $hotel->company = $quesry->hotel_company;
                $hotel->url = $quesry->hotel_url;
                $hotel->save();

                //if repeated update in saved it's repeated
            } elseif (($counter_hotel2_in_hotel1 != 0) || ($counter_hotel2_in_hotel3 != 0)) {
                \App\hotels::where("email", $quesry->hotel_address)
                    ->where("phoneNumber", $quesry->hotel_phoneNumber)->update(["repeated" => 1]);
            }
        });
    // return seponse
    $array_to_show=array();
    $total_data=\Illuminate\Support\Facades\DB::connection('hotel2')->table("hotel2.hotels")->count();
    $array_to_show["status"]="sucess to insert data";
    $array_to_show["count_data"]=$total_data;
    $array_to_show["number_pages"]=ceil($total_data/10);
    $array_to_show["processing_in_every_page"]=10;
    $array_to_show["next_page"]=(ceil($total_data/10))>=$page+1?$page+1:1;
    $array_to_show["next_url"]=$request->url()."?page=".$array_to_show["next_page"];

    return response()->json($array_to_show);

});
/*third*/
Route::get("insert_data_from_third_hotel",function (\Illuminate\Http\Request $request) {

    //h_address in database3 contain value of email and h_email contain value of address

    $page=$request->input("page")?$request->input("page"):1;
    set_time_limit(1800);

    $data = \Illuminate\Support\Facades\DB::connection('hotel3')->table("hotels")
        ->select("hotel3.hotels.*")->paginate(10)->each(function ($quesry) {

            //to check if data in hotel3 repeated in hotel1
            $counter_hotel3_in_hotel1 = count(\Illuminate\Support\Facades\DB::connection('hotel1')->table("hotels")
                //->leftJoin("hotel2.hotels.hotel_email","=","hotel1.hotels.email")
                ->where("hotels.address", $quesry->h_address)
                ->where("hotels.name", $quesry->h_name)
                ->where("hotels.phoneNumber", $quesry->h_phoneNumber)
                ->get());

            //to check if data in hotel3 repeated in hotel2
            $counter_hotel3_in_hotel2 = count(\Illuminate\Support\Facades\DB::connection('hotel2')->table("hotels")
                //->leftJoin("hotel2.hotels.hotel_email","=","hotel1.hotels.email")
                ->where("hotels.hotel_address", $quesry->h_address)
                ->where("hotels.hotel_name", $quesry->h_name)
                ->where("hotels.hotel_phoneNumber", $quesry->h_phoneNumber)
                ->get());

            //to check if saved it before or not
            $counter_is_registered_before = \App\hotels::where("email", $quesry->h_address)
                ->where("phoneNumber", $quesry->h_phoneNumber)
                ->count();

             // if not save  before save it
            if (($counter_is_registered_before == 0)) {
                $hotel = new \App\hotels();
                $hotel->email = $quesry->h_address;
                $hotel->email = $quesry->h_address;
                $hotel->name = $quesry->h_name;
                $hotel->phoneNumber = $quesry->h_phoneNumber;
                $hotel->address = $quesry->h_email;
                $hotel->country = $quesry->h_country;
                $hotel->city = $quesry->h_city;
                $hotel->state = $quesry->h_state;
                $hotel->street_name = $quesry->h_street_name;
                $hotel->postcode = $quesry->h_postcode;
                $hotel->company = $quesry->h_company;
                $hotel->url = $quesry->h_url;
                $hotel->save();
            }

            //if repeated update in saved it's repeated
            if (($counter_hotel3_in_hotel1 != 0) || ($counter_hotel3_in_hotel2 != 0)) {
                \App\hotels::where("email", $quesry->h_address)
                    ->where("phoneNumber", $quesry->h_phoneNumber)->update(["repeated" => 1]);
            }
        });

    //return response
    $array_to_show=array();
    $total_data=\Illuminate\Support\Facades\DB::connection('hotel2')->table("hotel2.hotels")->count();
    $array_to_show["status"]="sucess to insert data";
    $array_to_show["count_data"]=$total_data;
    $array_to_show["number_pages"]=ceil($total_data/10);
    $array_to_show["processing_in_every_page"]=10;
    $array_to_show["next_page"]=(ceil($total_data/10))>=$page+1?$page+1:1;
    $array_to_show["next_url"]=$request->url()."?page=".$array_to_show["next_page"];
    return response()->json($array_to_show);

});

//to download csv file of repeated data
Route::get("download_repeated_data_from_hotels",function (){

    $headers = [
        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename=repeated_hotels.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
    ];

    $list = \App\hotels::where("repeated",1)->get(["name","phoneNumber"])->toArray();

    $callback = function() use ($list)
    {
        $FH = fopen('php://output', 'w');
        fputcsv($FH, array( 'Name', 'Phone Number'),",");

        foreach ($list as $row) {
            fputcsv($FH, $row,",");
        }
        fclose($FH);
    };
    return Response::stream($callback, 200, $headers);
});




