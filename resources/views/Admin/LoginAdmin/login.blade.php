<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('adminpanel/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('LoginAdminColl/style1.css')}}">
  <style type="text/css">
      body{
      background-image:url({{url('LoginAdminColl/1.jpg')}});
      background-repeat:no-repeat;
      background-size:cover;
          }
  </style>
</head>
<body>
  <div class="vid-container"> 
    <div class="inner-container">
    @if(Session::has('danger'))
  <div class="alert alert-danger"style="font-size:15px;" >
  <i class="fa fa-times-circle" aria-hidden="true"></i>
{{Session::get('danger')}} 
  </div>
      @endif
      <div class="box">

 

        <h1>دخول مدير الموقع</h1>
        <form class="form-horizontal" role="form" method="post" action="{{ url('/kt/adminpanel/loginadmin') }}">
           {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div>
                <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required>
                  @if ($errors->has('email'))
                      <span class="help-block" style="margin-left: 60px">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div>
                <input id="password" type="password"  name="password" placeholder="Password" required>
                  @if ($errors->has('password'))
                      <span class="help-block" style="margin-left: 60px">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i> Login</button>
        </form> 
      </div>       
    </div>
  </div>  
  <script src="{{asset('LoginAdminColl/index.js')}}"></script>
</body>
</html>
