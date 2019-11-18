@extends('layouts.layoutback')
<!-- responsive css -->
<style>
    #myMap2
    {
        height: 350px;
        width: 680px;
    }
</style>
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-deafult">
                    <div class="box-header with-border text-center" >
                        <h3 class="box-title">اضافة فرع جديد</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{url("admin_add_branch")}}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body" style=" color:white; padding:30px 50px ">
{{csrf_field()}}

                        <div class="results"></div>

                        <div class="form-group">

                            <div class="col-sm-3 @if($errors->has('address')) has-error @endif">
                                <p  class="btn btn-primary search">عمل بحث للمكان للاظهار علي الخريطة</p>
                            </div>
                            <div class="col-sm-7 @if($errors->has('address')) has-error @endif">
                                <input type="text" id="address" required class="btn-file form-control write_place" name="address" placeholder="" >

                                <font size=" 3" color="red" > {{$errors->first("address")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">اكتب العنوان</label>
                        </div>
                        <div class="form-group lab" >
                            <div class="col-sm-10">
                                <div id="myMap2"></div>
                                <input id="address" type="hidden" style="width:600px; color: black;"/><br/>
                                <input type="hidden" id="latitude" name="lat" placeholder="Latitude" style="color: black; "/>
                                <input type="hidden" id="longitude" name="lang" placeholder="Longitude" style="color: black;"/>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">ضع العنوان علي الخريطة</label>
                        </div>
                    </div>
                    <div class="box-footer" style="">
                        <button type="submit" class="btn btn-primary center-block" style="">حفظ البيانات</button>
                    </div>
                    </form>
                </div>


            </div>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBT5Xaa_sfb7kvA2KRC8MABJBBKDYE6h4">
    </script>

    <script src="{{asset('adminpanel/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{asset('adminpanel/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

    <script>
        var map;
        var marker;

        /*
         if(cities=="مدينة نصر"){
         x.results[0].geometry.location.lat=30.07925;
         x.results[0].geometry.location.lng=31.31791099999998;
         }
         */
        var myLatlng = new google.maps.LatLng(30.07925,31.31791099999998);
        //var myLatlng = new google.maps.LatLng(x.results[0].geometry.location.lat,x.results[0].geometry.location.lng);
        //var myLatlng         =new google.maps.LatLng(x.results[0].geometry.location.lat,x.results[0].geometry.location.lng);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        // function initialize(){
        var mapOptions = {
            zoom: 18,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //console.log("islam");
        map = new google.maps.Map(document.getElementById("myMap2"), mapOptions);

        marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    //$('#address').css('display','block');
                    // $('#latitude,#longitude').show();
                   // $('#address').val(results[0].formatted_address);
                    //$('#latitude').val(marker.getPosition().lat());
                    // $('#longitude').val(marker.getPosition().lng());
                    //$('#latitude').css('display','none');
                    //$('#longitude').css('display','none');
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });

        google.maps.event.addListener(marker, 'dragend', function() {

            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        //$('#address').css('display','block');
                       // $('#address').val(results[0].formatted_address);
                        //$('#latitude').val(marker.getPosition().lat());
                        //$('#longitude').val(marker.getPosition().lng());
                        //$('#latitude').css('display','none');
                        //$('#longitude').css('display','none');
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            console.log("islammklj")
            $('.countryselect').change(function () {
                var countryselect=$(this).last().val();
                $.ajax({
                    url: '{{ url('/kt/admin/governatebyajax') }}',
                    type:'post',
                    dataType:'json',
                    data:{country_id:countryselect,'_token':'{!! csrf_token() !!}'},
                    success:function(x,y,z)
                    {
                        $('.governate').css('display','block');
                        if(x.governate.length!=0){
                            $('.governateselect')
                                .last()
                                .find('option')
                                .remove()
                                .end()
                                .append('<option>اختر المحافظة</option>');
                            for (var i=0; i<x.governate.length; i++)
                            {
                                $("<option>",{value: x.governate[i]['id'],text: x.governate[i]['governate']}).appendTo(document.getElementsByClassName('governateselect')[document.getElementsByClassName('governateselect').length - 1]);
                            }
                        }
                        else {
                            $('.governateselect')
                                .last()
                                .find('option')
                                .remove()
                                .end();

                            $("<option>",{value:0,text: 'لا توجد محافظات تم اضافتها للبلد'}).appendTo(document.getElementsByClassName('governateselect')[document.getElementsByClassName('governateselect').length - 1]);

                        }
                    },
                });
            })
            $('.governateselect').change(function () {
                var governateselect=$(this).last().val();
                console.log(governateselect);
                $.ajax({
                    url: '{{ url('/kt/admin/citybyajax') }}',
                    type:'post',
                    dataType:'json',
                    data:{governates_id:governateselect,'_token':'{!! csrf_token() !!}'},
                    success:function(x,y,z)
                    {
                        $('.city').css('display','block');
                        if(x.city.length!=0){
                            $('.cityselect')
                                .last()
                                .find('option')
                                .remove()
                                .end()
                                .append('<option>اختر المدينة</option>');
                            for (var i=0; i<x.city.length; i++)
                            {
                                $("<option>",{value: x.city[i]['id'],text: x.city[i]['city_ar']}).appendTo(document.getElementsByClassName('cityselect')[document.getElementsByClassName('cityselect').length - 1]);
                            }
                        }
                        else {
                            $('.cityselect')
                                .last()
                                .find('option')
                                .remove()
                                .end();

                            $("<option>",{value:0,text: 'لا توجد مدن تم اضافتها للمحافظة'}).appendTo(document.getElementsByClassName('cityselect')[document.getElementsByClassName('cityselect').length - 1]);

                        }
                    },
                });
            })
            //start cityselect
            $('.search').click(function () {
                //$(this).preventDefault();
                var place=$('.write_place').val();
                console.log(place+" ***");
                $.ajax({
                    url: 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA92O-cda-m9FjjOapt2N8FaFGvWfbaw7Y&address='+place+'',
                    type:'get',
                    dataType:'json',
                    success:function(x,y,z)
                    {
                        console.log(x.status);
                        if(x.status=="OVER_QUERY_LIMIT"){
                            alert("You have exceeded your daily request quota for this API. If you did not set a custom daily request quota, verify your project has an active billing account")
                            return 0;
                        }
                        if(x.status=="REQUEST_DENIED"){
                            alert("Error in connection with network")
                            return 0;
                        }
                        if(x.results.length==0){
                            alert("there is no location found")
                            return 0;
                        }
                        $('.lab').css('display','block');
                        console.log("object "+x);
                        console.log(x.results[0].geometry.location.lat);
                        console.log(x.results[0].geometry.location.lng);
                        $('#latitude').val(x.results[0].geometry.location.lat);
                        $('#longitude').val(x.results[0].geometry.location.lng);
                        var map;
                        var marker;

                        /*
                        if(cities=="مدينة نصر"){
                            x.results[0].geometry.location.lat=30.07925;
                            x.results[0].geometry.location.lng=31.31791099999998;
                        }
                        */
//var myLatlng = new google.maps.LatLng(20.268455824834792,85.84099235520011);
                        //var myLatlng = new google.maps.LatLng(x.results[0].geometry.location.lat,x.results[0].geometry.location.lng);
                        var myLatlng         =new google.maps.LatLng(x.results[0].geometry.location.lat,x.results[0].geometry.location.lng);
                        var geocoder = new google.maps.Geocoder();
                        var infowindow = new google.maps.InfoWindow();
                        // function initialize(){
                        var mapOptions = {
                            zoom: 18,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        console.log("islam");
                        map = new google.maps.Map(document.getElementById("myMap2"), mapOptions);

                        marker = new google.maps.Marker({
                            map: map,
                            position: myLatlng,
                            draggable: true
                        });

                        geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    //$('#address').css('display','block');
                                   // $('#latitude,#longitude').show();
                                   // $('#address').val(results[0].formatted_address);
                                    $('#latitude').val(marker.getPosition().lat());
                                   $('#longitude').val(marker.getPosition().lng());
                                    //$('#latitude').css('display','none');
                                    //$('#longitude').css('display','none');
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                }
                            }
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {

                            geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        //$('#address').css('display','block');
                                        //$('#address').val(results[0].formatted_address);
                                        $('#latitude').val(marker.getPosition().lat());
                                        $('#longitude').val(marker.getPosition().lng());
                                        //$('#latitude').css('display','none');
                                        //$('#longitude').css('display','none');
                                        infowindow.setContent(results[0].formatted_address);
                                        infowindow.open(map, marker);
                                    }
                                }
                            });
                        });

                        //}
                        console.log("afsdewrrwrw");
                        // google.maps.event.addDomListener(window, 'load',initialize);

                    },
                });
            })//

        });
    </script>

@endsection