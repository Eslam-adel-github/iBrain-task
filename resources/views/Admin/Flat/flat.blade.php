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
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضافة شقة جديد </button>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                        <form class="form-horizontal form-label-left" method="post" action="{{url('adminpanel/falt/add')}}" enctype="multipart/form-data">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">اضافة شقة جديد</h4>
                                    </div>
                                    <div class="modal-body">



                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="text" name="owner_name"  class="form-control">
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_ar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم الساكن</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="text" name="flat_number"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">رقم الشقة </label>

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

                            <th style="width: 8%">الرقم</th>
                            <th style="width: 22%">  رقم الشقة</th>
                            <th style="width: 22%"> اسم المالك </th>
                            <th style="width: 15%"></th>
                            <th style="width: 15%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($data) && !empty($data)): ?>
                        <?php foreach ($data as $key => $value): ?>
                        <form method="post" action="{{url('adminpanel/flat/update/'.$value->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>

                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <input type="text" name="flat_number" required="required" class="form-control" value="<?php echo $value->flat_number; ?>">

                                </td>
                                <td>
                                    <input type="text" name="owner_name" required="required" class="form-control" value="<?php echo $value->owner_name; ?>">

                                </td>

                                <td>
                                    <button type="submit" class="btn btn-info btn-md">حفظ التغييرات</button>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{url("/adminpanel/show_flat_benefits/".$value->id)}}">عرض مستحقات الشقة</a>
                                </td>
                                <td>
                                    <a href="{{url('/adminpanel/flat/delete/'.$value->id)}}"><button type="button" class="btn btn-danger btn-md">مسح</button></a>
                                </td>

                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
            {{ $data->links()}}
                </div>

            </div>

@endsection