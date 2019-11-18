@extends("layouts.layoutback")
@section("content")
    <!-- Main content -->
    <style>
        .fa{
            color: white !important;
        }
    </style>
    <section class="content">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner text-center">
                    <h3>{{count(\App\flat::all())}}</h3>

                    <p>الشقق</p>
                </div>

                <a href="{{url('/adminpanel/falt/show')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner text-center">
                    <h3>{{count(\App\benefit::all())}}</h3>

                    <p>الاستحقاقات</p>
                </div>

                <a href="{{url('/adminpanel/register/benefits')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner text-center">
                    <h3>{{count(\App\out_benefits::all())}}</h3>

                    <p>المصروفات</p>
                </div>

                <a href="{{url('/adminpanel/register/benefits')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner text-center">
                    <h3 style="opacity: 0">22</h3>

                    <p>الرصيد الحالي في الصندوق</p>
                </div>

                <a href="{{url('/adminpanel/balance_now')}}" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <section>
@endsection