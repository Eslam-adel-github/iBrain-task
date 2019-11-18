@extends('layouts.layoutback')

@if(Session::has('insertd'))
    <script>
        swal({
            title: "{{Session::get('inserted')}}",
            text: "This Message Will Close in 4 Seconds",
            timer: 4000,
            showConfirmButton:false
        });


    </script>
@endif
@section('content')
    <div class="box">
        <!-- /.box-header
        <div class="box-body">
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضافة منتج جديد </button>
-->
        <form action="{{url("/kt/adminpanel/searchbyproduct")}}" method="get">
            <div class="form-group choosetypes col-sm-4 col-sm-offset-4" style="margin-top: 15px">
                <label for="email">ابحث ثم اختر المنتج:</label>
                <select class="form-control selectpicker chooseproduct" id="select-country" onchange="this.form.submit()" data-live-search="true" name="id" style="direction: ltr">
                    <option value="0">اكتب كود المنتج او اسم المنتج</option>
                    @foreach($productcategory as$key=>$value)
                        <option value="{{$value->id}}">{{$value->name_ar}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="containers">
            <table class="table table-striped projects text-center">
                <thead>
                <tr>

                    <th style="width: 8%">الرقم</th>
                    <th style="width: 35%">  الاسم عربي</th>
                    <th style="width: 35%">  الاسم انجليزي</th>
                    <th style="width: 20%">  القسم التابع لة</th>
                    <th style="width: 20%">تفاصيل الوصف</th>
                    <th style="width: 18%">الصورة</th>
                    <th style="width: 15%"></th>
                    <th style="width: 15%"></th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($products) && !empty($products)): ?>
                <?php foreach ($products as $key => $value): ?>
                <form method="post" action="{{url('/kt/adminpanel/product/update/'.$value->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <tr>

                        <td>
                            <?php echo $key + 1; ?>
                        </td>
                        <td>
                            <input type="text" name="name_ar" required="required" class="form-control" value="<?php echo $value->name_ar; ?>">
                        </td>
                        <td>
                            <input type="text" name="name_en" required="required" class="form-control" value="<?php echo $value->name_en; ?>">
                            @if ($errors->has('name_en'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('name_en') }}</strong>
                                        </span>
                            @endif
                        </td>
                        <td>
                            <select class="form-control" name="categories_id">
                                @foreach(\App\category::all() as$key=>$categryvalue)
                                    @if($value->categories_id==$categryvalue->id)
                                        <option selected value="{{$categryvalue->id}}">{{$categryvalue->name_ar}}</option>
                                    @else
                                        <option value="{{$categryvalue->id}}">{{$categryvalue->name_ar}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target=".bs-example-modal-lg{{$value->id}}">  عرض التفاصيل</button>

                            <div class="modal fade bs-example-modal-lg{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        {{csrf_field()}}
                                        <div class="modal-header">
                                            <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <input type="hidden" name="id" value="{{$value->id}}">
                                            <h4 class="modal-title" id="myModalLabel">عرض التفاصيل</h4>
                                            <br>
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                                <textarea class="form-control" rows="4" name="description_ar" required>
  {{$value->description_ar}}
                                                                </textarea>
                                                    @if ($errors->has('rate'))
                                                        <span class="help-block">
                                                                    <strong>{{ $errors->first('rate') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">وصف عربي</label>
                                                <?php

                                                ?>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }}">
                                                <div class="col-md-9 col-sm-9 col-xs-12 ">
 <textarea class="form-control" rows="4" name="description_en" required>
  {{$value->description_en}}
                                                                </textarea>
                                                    @if ($errors->has('description_en'))
                                                        <span class="help-block">
                                                                    <strong>{{ $errors->first('description_en') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">وصف انجليزي</label>
                                                <?php

                                                ?>
                                            </div>
                                        </div>
                                    <!--
                      <div class="modal-body">



                        <div class="form-group {{ $errors->has('services') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">التفاصيل </label>
                          <div class="col-md-9 col-sm-9 col-xs-12 ">
                            <textarea rows="8" name="services"  class="form-control">{{$value->summary}}</textarea>
                            @if ($errors->has('city'))
                                        <span class="help-block">
                                                                          <strong>{{ $errors->first('services') }}</strong>
                                                            </span>
                            @endif
                                            </div>
                                          </div>
                                        </div>


                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                                         <!--
                                          <button type="submit" class="btn btn-primary pull-left"> اضافة</button>

                                        </div>
                  -->
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            @if($value->image!=null)
                                <img width="70px" src="{{asset('product/'.$value->image)}}">
                            @else
                                <p >من فضلك ارفع صورة</p>
                            @endif
                            <input type="file" class="form-control" name="image" style="margin-top: 5px;">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                            @endif
                        </td>

                        <td>
                            <button type="submit" class="btn btn-info btn-md">حفظ التغييرات</button>
                        </td>
                        <td>
                            <a href="{{url('/kt/adminpanel/product/delete/'.$value->id)}}"><button type="button" class="btn btn-danger btn-md">مسح</button></a>
                        </td>
                    </tr>
                </form>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>

            <div class="col-sm-offset-6 col-sm-6">{{$products->links()}}</div>
        </div>
        <div class="result"></div>
    </div>

@endsection