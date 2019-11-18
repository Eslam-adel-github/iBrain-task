
<div>
    <hr style="border-top-width: 2px; border-color: #3c8dbc;">
    <div class="form-group">
        <label  class="col-sm-1" >
            <p class="closing" href="#" style="color:red;font-size: 15px; cursor: pointer"><i class="fa fa-close"></i></p></label>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" name="name_ar[]"  class="form-control" required>
            @if ($errors->has('name_ar'))
                <span class="help-block">
                    <strong>{{ $errors->first('name_ar') }}</strong>
                </span>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12"> اكتب الاسم عربي</label>

    </div>
    <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
        <label  class="col-sm-1" >
            <p  href="#"><i style="font-size: 15px; cursor: pointer" class=""></i></p>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" name="name_en[]"  class="form-control" required>
            @if ($errors->has('name_en'))
                <span class="help-block">
                      <strong>{{ $errors->first('name_en') }}</strong>
                 </span>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12"> اكتب الاسم انجليزي</label>

    </div>

    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
        <label  class="col-sm-1" >
            <p  href="#"><i style="font-size: 15px; cursor: pointer" class=""></i></p>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="file" name="image[]"  class="form-control" required>
            @if ($errors->has('image'))
                <span class="help-block">
                     <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif

        </div>
        <label class="control-label col-md-2 col-sm-2 col-xs-12">رفع صورة</label>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $('.closing').click(function () {
        console.log("abbas");
        $(this).parent().parent().parent().remove();
    });

</script>

