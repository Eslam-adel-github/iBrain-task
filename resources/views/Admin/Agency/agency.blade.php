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

                   <div class="containers">
                       <form action="{{url("/kt/adminpanel/searchbyagency")}}" method="get">
                           <div class="form-group choosetypes col-sm-4 col-sm-offset-4" style="margin-top: 15px">
                               <label for="email">بحث :</label>
                               <select class="form-control selectpicker chooseproduct" id="select-country" onchange="this.form.submit()" data-live-search="true" name="id" style="direction: ltr">
                                   <option value="0">ابحث ثم اختر </option>
                                   @foreach(\App\agency::all() as$key=>$value)
                                       <option value="{{$value->id}}">{{$value->name_ar}}</option>
                                   @endforeach
                               </select>
                           </div>
                       </form>
                    <table class="table table-striped projects text-center">
                        <thead>
                        <tr>

                            <th style="width: 8%">الرقم</th>
                            <th style="width: 35%">  الاسم عربي</th>
                            <th style="width: 35%">  الاسم انجليزي</th>
                            <th style="width: 18%">الصورة</th>
                            <th style="width: 15%"></th>
                            <th style="width: 15%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($agency) && !empty($agency)): ?>
                        <?php foreach ($agency as $key => $value): ?>
                        <form method="post" action="{{url('/kt/adminpanel/agency/update/'.$value->id)}}" enctype="multipart/form-data">
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
                                    @if($value->image!=null)
                                        <img width="70px" src="{{asset('agency/'.$value->image)}}">
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
                                    <a href="{{url('/kt/adminpanel/agency/delete/'.$value->id)}}"><button type="button" class="btn btn-danger btn-md">مسح</button></a>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="col-sm-offset-6 col-sm-6">{{$agency->links()}}</div>
        </div>
        <div class="result"></div>
                </div>

@endsection