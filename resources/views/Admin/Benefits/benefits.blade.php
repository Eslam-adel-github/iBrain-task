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
                    <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">اضافة استحقاق جديد </button>

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                        <form class="form-horizontal form-label-left" method="post" action="{{url('adminpanel/register/benefits/add')}}" enctype="multipart/form-data">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">اضافة استحقاق جديد</h4>
                                    </div>
                                    <div class="modal-body">



                                        <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <textarea type="text" required name="description" rows="3"  class="form-control"></textarea>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('name_ar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">وصف الاستحقاق</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="number" step="any" required name="money_to_pay"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">مبلغ الاستحقاق</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <input type="date" step="any" required name="date_to_pay"  class="form-control">
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('name_en') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">تاريخ الاستحقاق</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 " >
                                                <select class="form-control" name="type">
                                                    <option value="1"> شهرية</option>
                                                    <option value="2">طارئة</option>
                                                </select>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اختر نوع الاستحقاق</label>

                                        </div>
                                        <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <select class="form-control flat_type" name="flat_type">
                                                    <option value="1">لكل الشقق</option>
                                                    <option value="2">لشقة معينة</option>
                                                </select>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">الشقة</label>

                                        </div>
                                        <div class="form-group flat {{ $errors->has('name_en') ? ' has-error' : '' }}" style="display: none">
                                            <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                <select class="form-control " name="flat_id[]" multiple>
                                                    @foreach(\App\flat::all() as$key=>$value)
                                                        <option value="{{$value->id}}">{{$value->flat_number}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اختر الشقة</label>

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
                            <th style="width: 22%">  وصف الاستحقاق</th>
                            <th style="width: 22%"> مبلغ الاستحقاق </th>
                            <th style="width: 22%"> تاريخ الاستحقاق </th>
                            <th style="width: 15%">نوع الاستحقاق</th>
                            <th style="width: 15%">عرض الشقق</th>
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
                                    <?php echo $value->money_to_pay; ?>

                                </td>
                                <td>
                                    <?php echo $value->date_to_pay; ?>
                                </td>
                                <td>
                                    @if($value->type==1)
                                       دفعات شهرية
                                    @else
                                        دفعة طارئة
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{url('/adminpanel/benefits/flat/'.$value->id)}}">عرض الشقق التي في الاستحقاق</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".flat_type").change(function () {
                var flat_type =$(this).val();
                console.log("val is "+flat_type);
                if(flat_type==1){
                    $(".flat").css("display","none");
                }
                else if(flat_type==2){
                    $(".flat").css("display","block");
                }
            })
        })
    </script>

@endsection