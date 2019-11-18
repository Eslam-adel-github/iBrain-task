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
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضغط هنا لتحديد فترة</button>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                        <form class="form-horizontal form-label-left" method="post" action="{{url('adminpanel/benefits_out/period/report')}}" enctype="multipart/form-data">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"> لتحديد فترة </h4>
                                    </div>
                                    <div class="modal-body">



                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="date"  required name="start_date"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">حدد البداية</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="date"  required name="end_date"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">حدد النهاية</label>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                                        <button type="submit" class="btn btn-primary pull-left"> بحث</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>

                            <th style="width: 8%">الرقم</th>
                            <th style="width: 22%">  وصف الصرف</th>
                            <th style="width: 22%"> مبلغ الصرف </th>
                            <th style="width: 22%"> تاريخ الصرف </th>
                            <th style="width: 15%">من قام بالصرف</th>
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
                                    <?php echo $value->description; ?>

                                </td>
                                <td>
                                    <?php echo $value->money; ?>

                                </td>
                                <td>
                                    <?php echo $value->action_done; ?>
                                </td>
                                <td>
                                    <?php echo $value->who_take; ?>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
            <?php if (isset($data) && !empty($data)): ?>
                {{ $data->links()}}
            <?php endif; ?>
                </div>

            </div>
@endsection