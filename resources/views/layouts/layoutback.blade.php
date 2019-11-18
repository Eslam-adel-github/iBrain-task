<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>adminpanel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminpanel/dist/css/AdminLTE-RTL.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/iCheck/flat/blue.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/morris/morris.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminpanel/niceforms-default.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
  <script  src="{{asset('adminpanel/niceforms.js')}}"></script>


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" >
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">

   <!-- <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>-->


    @yield("header")
    @yield("style")
    <style type="text/css">
.sweet-alert { 
background-color:#fff; 
}
.sweet-alert h2{
  color: #9a6510;
}
.sweet-alert p{
  color:#9a6510;
  font-weight: bold;
  font-size: 15px;
}

    </style>
  <!--
  <link href="{{asset('site/css/style.css')}}" rel="stylesheet">

  <!--<link rel="stylesheet" href="css/responsive.css">
  <link href="{{asset('site/css/responsive.css')}}" rel="stylesheet">
  -->
  <style>
    .sidebar-menu li a:hover::before, .sidebar-menu li.active a::before{
      background: none !important;
    }
    .sidebar-menu li a::before{
      background: none;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper" >

  <header class="main-header" >
    <!-- Logo -->
    <a href="{{url('admin_home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels-->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices-->
      <span class="logo-lg"><b>Admin  </b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">


          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel
<div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('adminpanel/dist/img/knocktargetlogo.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

        </div>
      </div>

-->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="بحث" disabled="">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><a href="{{url('admin_home')}}">الرئيسيه</a></li>
        @include("layouts.nav")
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 <div class="content-wrapper" id="contentid" style=" background-color: #eee;">
     <section class="content-header" style="background-color:#222d32;padding-bottom: 15px">
                  <h1 class="page-title txt-color-blueDark text-center" >
                    <i class="fa-fw fa fa-home" style="color: white"></i>
                  </h1>
    </section>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 @if(Session::has('inserted'))
       <script>



    swal({
      title: "{{Session::get('inserted')}}",
      text: "",
      timer: 4000,
      showConfirmButton:false,
      animation: true,
      icon:'success'
    });

     </script>
@elseif(Session::has('success'))
       <script>
    swal({
      title: "{{Session::get('success')}}",
      text: "انتظر 4 ثوانى لانهاء هذه الرساله",
      timer: 4000,
      showConfirmButton:false,
       animation: true,

    });
    <?php if(isset($_SESSION['danger'])){ unset($_SESSION['danger']); } ?>
     </script>
@elseif(Session::has('update'))
         <script>
             swal({
                 title: "{{Session::get('update')}}",
                 text: "انتظر 4 ثوانى لانهاء هذه الرساله",
                 timer: 4000,
                 showConfirmButton:false,
                 animation: true,

             });
         </script>
     @endif
@yield("content")
</div>


<!--
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
-->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>













<!-- jQuery 2.2.3-->
<script src="{{asset('adminpanel/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!--jQuery UI 1.11.4-->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('adminpanel/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Morris.js charts -->



<!--
<script src="{{asset('adminpanel/plugins/morris/morris.min.js')}}"></script>
-->

<!-- Sparkline -->

<script src="{{asset('adminpanel/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- jvectormap -->
<script src="{{asset('adminpanel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>


<script src="{{asset('adminpanel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>


<!-- jQuery Knob Chart -->
<script src="{{asset('adminpanel/plugins/knob/jquery.knob.js')}}"></script>



<!-- daterangepicker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>




<script src="{{asset('adminpanel/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('adminpanel/plugins/datepicker/bootstrap-datepicker.js')}}"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('adminpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>


<!-- Slimscroll -->

<script src="{{asset('adminpanel/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>


<!-- FastClick -->
<script src="{{asset('adminpanel/plugins/fastclick/fastclick.js')}}"></script>


<!-- AdminLTE App -->

<script src="{{asset('adminpanel/dist/js/app.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--
<script src="{{asset('adminpanel/dist/js/pages/dashboard.js')}}"></script>
-->

<!-- AdminLTE for demo purposes -->

<script src="{{asset('adminpanel/dist/js/demo.js')}}"></script>


<!--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>-->
<script src="{{asset('adminpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

@yield("footer")

</body>
</html>