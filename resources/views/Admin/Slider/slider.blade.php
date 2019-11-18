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

        <!-- /.box-header -->
        <div class="box-body">
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضافة صورة جديدة </button>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                        <form class="form-horizontal form-label-left" method="post" action="{{url('/kt/adminpanel/slider/add')}}" enctype="multipart/form-data">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">اضافة صورة جديدة </h4>
                                    </div>
                                    <div class="modal-body">



                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">

                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <textarea class="form-control" name="name_ar" rows="1"></textarea>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_ar') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم عربي</label>
                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <textarea class="form-control" name="name_en" rows="1"></textarea>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_en') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم انجليزي </label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <textarea class="form-control" name="description_ar" rows="3"></textarea>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_ar') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">وصف عربي</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <textarea class="form-control" name="description_en" rows="3"></textarea>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_en') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">وصف انجليزي </label>

                                        </div>

                                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="file" name="image"  class="form-control">
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('image') }}</strong>
                                                            </span>
                                                @endif

                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">رفع صورة</label>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                                        <button type="submit" class="btn btn-primary pull-left"> اضافة</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>

                            <th style="width: 5%">الرقم</th>
                            <th style="width: 40%">  الاسم عربي</th>
                            <th style="width: 40%">  الاسم انجليزي</th>
                            <th style="width: 12%">الصورة</th>
                            <th style="width: 8%">عرض التفاصيل</th>
                            <th style="width: 8%"></th>
                            <th style="width: 8%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($slider) && !empty($slider)): ?>
                        <?php foreach ($slider as $key => $value): ?>
                        <form method="post" action="{{url('/kt/adminpanel/slider/update/'.$value->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>

                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <textarea class="form-control" name="name_ar" rows="1" required>
 <?php echo $value->name_ar; ?>
                                    </textarea>

                                @if ($errors->has('name_ar'))
                                        <span class="help-block">
                                                                <strong>{{ $errors->first('name_ar') }}</strong>
                                                            </span>
                                    @endif
                                </td>
                                <td>
                                    <textarea class="form-control" name="name_en" rows="1" required>
 <?php echo $value->name_en; ?>
                                    </textarea>
                                </td>

                                <td>
                                    <img width="70px" src="{{asset('slider/'.$value->image)}}">
                                    <input type="file" class="form-control" name="image" style="margin-top: 5px;">
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                                                <strong>{{ $errors->first('image') }}</strong>
                                                            </span>
                                    @endif
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
                                    <button type="submit" class="btn btn-info btn-md">حفظ التغييرات</button>
                                </td>
                                <td>
                                    <a href="{{url('/kt/adminpanel/slider/delete/'.$value->id)}}"><button type="button" class="btn btn-danger btn-md">مسح</button></a>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
            {{ $slider->links()}}
                </div>

            </div>

@endsection