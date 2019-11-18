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
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضافة عنوان جديد </button>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                        <form class="form-horizontal form-label-left" method="post" action="{{url('/kt/adminpanel/address/add')}}" enctype="multipart/form-data">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">اضافة عنوان جديد</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="text" name="name"  class="form-control">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> اكتب العنوان عربي</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="text" name="name_en"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_en') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> اكتب العنوان انجليزي</label>
                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="text" name="name_en"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_fr') }}</strong>
                                                            </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> اكتب العنوان اسباني</label>
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
                            <th style="width: 33%">العنوان عربي</th>
                            <th style="width: 33%">العنوان انجليزي</th>
                            <th style="width: 13%"></th>
                            <th style="width: 13%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($adresses) && !empty($adresses)): ?>
                        <?php foreach ($adresses as $key => $value): ?>
                        <form method="post" action="{{url('/kt/adminpanel/address/update/'.$value->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>

                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <input type="text" name="name" required="required" class="form-control" value="<?php echo $value->name; ?>">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                    @endif
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
                                    <button type="submit" class="btn btn-info btn-md">حفظ التغييرات</button>
                                </td>
                                <td>
                                    <a href="{{url('/kt/adminpanel/address/delete/'.$value->id)}}"><button type="button" class="btn btn-danger btn-md">مسح</button></a>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
        <div class="col-sm-offset-6 col-sm-6">{{$adresses->links()}}</div>

            </div>

@endsection