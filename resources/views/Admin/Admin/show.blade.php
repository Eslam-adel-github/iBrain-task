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
                        <h3 class="box-title">تعديل بيانات الادمن</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{url('/kt/adminpanel/admin/update/information')}}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body" style=" color:white; padding:30px 50px ">
{{csrf_field()}}

                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('email')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="email" value="{{$admin->email}}" required>
                                <font size=" 3" color="red" > {{$errors->first("email")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">الايميل</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 @if($errors->has('password')) has-error @endif">
                                <input type="text" class="btn-file form-control" name="password" value="" required>
                                <font size=" 3" color="red" > {{$errors->first("password")}}</font>
                            </div>
                            <label  class="col-sm-2" style="font-size: 15px;font-weight: bolder;">اكتب الباسورد</label>
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