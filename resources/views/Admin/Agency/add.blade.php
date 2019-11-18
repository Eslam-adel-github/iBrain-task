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
                        <h3 class="box-title">اضافة Agency</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{url('/kt/adminpanel/agency/add')}}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body" style=" color:white; padding:30px 50px ">
{{csrf_field()}}

                        <div class="form-group">
                            <label  class="col-sm-1" >
                                <p class="product" href="#"><i style="font-size: 15px; cursor: pointer" class="fa fa-plus"></i></p>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                <input type="text" name="name_ar[]"  class="form-control" required>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> اكتب الاسم عربي</label>

                        </div>
                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                            <label  class="col-sm-1" >
                                <p  href="#"><i style="font-size: 15px; cursor: pointer" class=""></i></p>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                <input type="text" name="name_en[]"  class="form-control" required>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"> اكتب الاسم انجليزي</label>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label  class="col-sm-1" >
                                <p  href="#"><i style="font-size: 15px; cursor: pointer" class=""></i></p>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                <input type="file" name="image[]"  class="form-control" required>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">رفع صورة</label>
                        </div>
                        <div class="result"></div>
                    </div>
                    <div class="box-footer" style="">
                        <button type="submit" class="btn btn-primary center-block" style="">حفظ البيانات</button>
                    </div>
                    </form>
                </div>


            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.product').click(function (e) {
                $.ajax({
                    url:'{{url('/kt/adminpanel/increse/addservice')}}',
                    type:'get',
                    dataType:'json',
                    beforeSend:function ()
                    {

                    },success:function(x,y,z)
                    {
                        $('.box-body').append(x);
                    },

                });
            })
        })
    </script>

@endsection