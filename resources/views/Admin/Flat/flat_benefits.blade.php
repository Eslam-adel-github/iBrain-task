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
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>
                            <th style="width: 8%">رقم الشقة</th>
                            <th style="width: 15%">اسم المالك</th>
                            <th style="width: 22%">  وصف الاستحقاق</th>
                            <th style="width: 8%"> مبلغ الاستحقاق </th>
                            <th style="width: 15%"> تاريخ الاستحقاق </th>
                            <th style="width: 15%">نوع الاستحقاق</th>
                            <th style="width: 15%">دفع الاستحقاق</th>
                            <th style="width: 15%">حالة الدفع</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if (isset($data) && !empty($data)):
                        ?>
                        <?php foreach ($data as $key => $value): ?>
                        <form method="post" action="{{url('adminpanel/benefits_flat/update/'.$value->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>

                                <td>
                                    <?php echo $value->flat_number?>

                                </td>
                                <td>
                                    <?php echo $value->owner_name; ?>

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
                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target=".bs-example-modal-lg66{{$value->id}}"><i style="color:#fff" class="fa fa-eye-slash" aria-hidden="true"></i>تحديد حالة الدفع</button>

                                    <div class="modal fade bs-example-modal-lg66{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true" style="direction:rtl;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                {{csrf_field()}}
                                                <div class="modal-header">
                                                    <button type="button" class="close pull-left" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                    <h4 class="modal-title" id="myModalLabel">تحديد حالة الدفع</h4>
                                                    <br>
                                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                                                            <select class="form-control" name="pay_status">
                                                                @if($value->type1==1)
                                                                    <option value="1">تم الدفع</option>
                                                                    <option value="0">لم يتم الدفع بعد</option>
                                                                @else
                                                                    <option value="0">لم يتم الدفع بعد</option>
                                                                    <option value="1">تم الدفع</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تحديد حالة الفع</label>
                                                    </div>
                                                    <br><br>
                                                    <div class="col-sm-5 col-sm-offset-4" style="margin-top: 20px">
                                                        <button type="submit" class="btn btn-primary btn-md pull-left">حفظ</button>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </td>
                                <td>
                                    @if($value->type1==1)
                                        <i title="تم الدفع" class="fa fa-check" style="color: green; font-size:18px"></i>
                                    @else
                                        <i title="لم يتم الدفع" class="fa fa-close" style="color:red; font-size:18px"></i>
                                    @endif
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