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

                <table class="table table-striped projects text-center">
                    <thead>
                    <tr>
                        <th style="width: 18%">اجمالي الاستحقاق</th>
                        <th style="width: 18%">اجمالي المصروف</th>
                        <th style="width: 15%">اجمالي مافي الصندوق</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$sum}}</td>
                            <td>{{$pay}}</td>
                            <td>{{$sum-$pay}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
@endsection