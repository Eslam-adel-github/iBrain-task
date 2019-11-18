@extends('layouts.layoutback')
<!-- responsive css -->
<style>
    #myMap
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
                        <h3 class="box-title">اضافة وسائل التواصل</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{url('/kt/adminpanel/sociallinks/update')}}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body" style=" color:white; padding:30px 50px ">
{{csrf_field()}}

                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('facebook')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="facebook" value="{{$sociallinks->facebook}}" >
                                <font size=" 3" color="red" > {{$errors->first("facebook")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">الفيس بوك</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('fiber')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="fiber" value="{{$sociallinks->fiber}}" >
                                <font size=" 3" color="red" > {{$errors->first("fiber")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">الفا يبر</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('imo')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="imo" value="{{$sociallinks->imo}}">
                                <font size=" 3" color="red" > {{$errors->first("imo")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">الا يمو</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('whats')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="whats" value="{{$sociallinks->whats}}">
                                <font size=" 3" color="red" > {{$errors->first("whats")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">الواتس</label>
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
@endsection