<html>

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>tameen-jo</title>
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/css/fontawesome-all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/css/datepicker.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('website/css/index_style.css')}}"/>



    <link href="{{asset('website/css/menu.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/vendors.css')}}" rel="stylesheet">
    <link href="{{asset('website/css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">

</head>

<body>



<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="index.html" title="TameenJo">TameenJo</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <ul id="top_access">
                    <li><a data-toggle="modal" data-target="#exampleModalCenter"><i class="pe-7s-user"></i></a></li>
                    <li><a data-toggle="modal" data-target="#exampleModalCentersignup"><i class="pe-7s-add-user"></i></a></li>
                </ul>

                <div class="main-menu">
                    <ul>
                        <li class="submenu">
                            <a href="#0" class="show-submenu">Home</a>

                        </li>
                        <li class="submenu">
                            <a href="contact.html" class="show-submenu">Contact Us</a>
                        </li>

                        <li class="submenu">
                            <a href="#1" class="show-submenu">عربى</a>
                            <!--                                    <a href="#2" class="show-submenu">ُEN</a>-->
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>

</header>




<section class="slider">
    <div class="slider-inside">
        <div class="container-fluid">
            <div class="slider-content">
                <h4>Payment method is easy and secure</h4>
                <h6>Pay through credit card</h6>
            </div>
        </div>

    </div>
    <div class="white-gradient"></div>

</section>


<section class="navb-tabs">

    <div class="container register">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">TAMEENI TPL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TAMEENI COMP</a>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Comprehensive Insurance</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <input type="text" name="LGform1_user" class="form-control" placeholder="National ID" value="" required=""/>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input readonly type="text" class="form-control" id="usr1" name="event_date" placeholder="Which date you want this policy" autocomplete="off" ><i style="position:absolute; right:30px;top:10px;font-size: 20px;color: #09c;" class="far fa-calendar-alt"></i>
                                        </div>

                                        <div class="form-group col-md-2" style="margin-top: 10px">
                                            <a href="reg-form.html" class="btnContactSubmit">BUY NOW</a>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>





                    <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3  class="register-heading">Comprehensive Insurance</h3>
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <input type="text" name="LGform1_user" class="form-control" placeholder="National ID" value="" required=""/>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <input readonly type="text" class="form-control" id="usr1" name="event_date" placeholder="Which date you want this policy" autocomplete="off" ><i style="position:absolute; right:30px;top:10px;font-size: 20px;color: #09c;" class="far fa-calendar-alt"></i>
                                        </div>

                                        <div class="form-group col-md-2" style="margin-top: 10px">
                                            <a href="reg-form.html" class="btnContactSubmit">BUY NOW</a>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>




<div class="container margin_120_95">
    <div class="main_title">
        <h2>How does it work?	</h2>
    </div>
    <div class="row add_bottom_30">
        <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
                <span></span>
                <h3>Step 1</h3>
                <p>Enter policyholder ID and Vehicle details
                </p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
                <span></span>
                <h3>Step 2</h3>
                <p>Enter mobile, choose the quote, and select payment method
                </p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
                <h3>Step 3</h3>
                <p>Receive your insurance policy on email or in your account.
                </p>
            </div>
        </div>
    </div>
    <!-- /row -->

</div>
<!-- /container -->



<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Here's what you need</h2>
        </div>
        <div class="row justify-content-center">
            <div class=" col-md-3">
                <div class="list_home">
                    <div class="list_title">
                        <i class=" icon-vcard"></i>
                        <h3>National ID or Iqamah
                        </h3>
                    </div>

                </div>
            </div>
            <div class=" col-md-3">
                <div class="list_home">
                    <div class="list_title">
                        <i class="icon-address"></i>
                        <h3>National Address
                        </h3>
                    </div>

                </div>
            </div>
            <div class=" col-md-3">
                <div class="list_home">
                    <div class="list_title">
                        <i class="icon-vcard-1"></i>
                        <h3>Registration card
                        </h3>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="list_home">
                    <div class="list_title">
                        <i class="icon-credit-card"></i>
                        <h3>Credit Card
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<section class="client-testimonials py-2 my-2">
    <div class="text-center py-5 my-2"><h3>Client Testimonials</h3></div>
    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @Mamdouhashshamm</h4>
                <p>خدمة ممتازه ، يعطيكم العافية عليه دقائق معدوده وتم تفعيل التامين برسالة للبريد الالكتروني</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @abdulhameed1997</h4>
                <p>@TameeniKSA بصراحه موقع جميل ويسهل على الكثير تجديد التأمين اليوم كانت تجربتي له في خمس دقائق وأنا طابع وثيقة التأمين وانتظر موافقة نجم فقط</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @turky2290</h4>
                <p>خدمتكم ممتازة وتختصر الوقت وتقضى على تلاعب مكاتب الوسطاء. واتمنى الكم التوفيق</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @HIDIY912</h4>
                <p>خلال اقل من نص ساعه تم التسجيل وتعبئة البيانات واختيار التامين واصدار الفاتورة وسدادها واصدار وثيقة التامين خدمة رائعه#نفتخر_بكم</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @YAZID_AQ</h4>
                <p>@TameeniKSAشكرا لكم ،، منصه رائعه اختصرت جهد يوم في التنقل بين شركات التأمين الى خمس دقائق.. وانت مروق بعد الفطور تسجل وتدفع وتوصلك الوثيقه وانت ماكملت فنجالك</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @saaad264</h4>
                <p>شكراً لكم على سرعة الاستجابة رغم ضيق الوقت وقت فطور ولكم جزيل الشكر على الخدمة على الخدمة والتعامل الاكثر من رائع</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @HAAAAADII</h4>
                <p>@TameeniKSAتوني مأمن عن طريقكم ماتوقعت الامر بالسهولة اقل من 5 دقايق وانت مأمن والوثائق كلها تاخذها من الموقع وترسل على ايميلك... صراحه رحتنا</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @Mamdouhashshamm</h4>
                <p>خدمة ممتازه ، يعطيكم العافية عليه دقائق معدوده وتم تفعيل التامين برسالة للبريد الالكتروني</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @Mamdouhashshamm</h4>
                <p>خدمة ممتازه ، يعطيكم العافية عليه دقائق معدوده وتم تفعيل التامين برسالة للبريد الالكتروني</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @Mamdouhashshamm</h4>
                <p>خدمة ممتازه ، يعطيكم العافية عليه دقائق معدوده وتم تفعيل التامين برسالة للبريد الالكتروني</p>
            </div>
            <div class="item">
                <h4><i class="fab fa-twitter"></i> @Mamdouhashshamm</h4>
                <p>خدمة ممتازه ، يعطيكم العافية عليه دقائق معدوده وتم تفعيل التامين برسالة للبريد الالكتروني</p>
            </div>


        </div>
    </div>
</section>


<section class="questions py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Frequently Asked Questions (FAQ's)</h2>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is the difference between thir...
                                </a>
                            </h4>

                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.le VHS.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What is the unified policy for comp...
                                </a>
                            </h4>

                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is the residence number?
                                </a>
                            </h4>

                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                        </div>
                    </div>
                </div>

                <a class="btn btn-info">See All Questions</a>
            </div>
            <div class="col-md-5">
                <img class="img-fluid" src="img/flat-tyre.png">
            </div>
        </div>
    </div>
</section>

<section class="number">
    <div class=" text-center number-content">
        <h1><i class="fas fa-phone"></i> 920000419</h1>
        <h6>Call Center Working Hours</h6>
        <p>Saturday to Thursday: from 8:00 am to 7:00 pm</p>
    </div>
</section>

<section class="about-us py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img style="margin-top: -80px;" class="img-fluid" src="img/flat,550x550,075,f.u2.jpg">
            </div>
            <div class="col-md-7">
                <h2>Who Are We?</h2>
                <p>Tameen-JO is the FIRST licensed "Online Insurance Marketplace", and is owned by "Insurance House Co." a licensed brokerage company. Tameeni's mission is to make obtaining an insurance policy significantly easier and faster, to connect individuals and corporations with insurance companies in the most efficient manner. Run by a highly skilled team, Tameeni follows methods that comply with the highest standards and best practices. Such methods are designed to keep up with development changes in the most efficient manner, supporting the insurance industry and providing it with high-quality services.</p>
            </div>
        </div>
    </div>
</section>

<section class="our-partner">
    <div class="text-center"><h2>Our Partners</h2></div>
    <div class="owl-carousel owl-theme">
        <div class="item1 "><img src="img/Arabia-logo.jpg"></div>
        <div class="item1 "><img src="img/Acig-logo.jpg"></div>
        <div class="item1 "><img src="img/Al-Ahlia-logo.jpg"></div>
        <div class="item1 "><img src="img/Malath-logo.jpg"></div>
        <div class="item1 "><img src="img/salama-logo.jpg"></div>
        <div class="item1 "><img src="img/solidatry-logo%20gray.png"></div>
        <div class="item1 "><img src="img/Walaa-logo.jpg"></div>
        <div class="item1 "><img src="img/TUCI-Logo%20Gray.jpg"></div>
        <div class="item1 "><img src="img/allianz-logo.jpg"></div>
        <div class="item1 "><img src="img/al-sagr-black.png"></div>
        <div class="item1 "><img src="img/Arabian-sield-logo.jpg"></div>
        <div class="item1 "><img src="img/art_grey.jpg"></div>


    </div>
</section>


<!-- app_section -->
<div id="app_section">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-5">
                <p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p>
            </div>
            <div class="col-md-6">
                <small>Application</small>
                <h3>Download <strong>TameenJo App</strong> Now!</h3>
                <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
                <div class="app_buttons wow" data-wow-offset="100">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
                </div>
                <a href="#0"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
                <a href="#0"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /app_section -->


<footer class="py-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 foot-content">
                <p style="padding-top: 10px;">© <span class="iog-color">Tammen-Jo.</span> All Rights Reserved | Design By <a href="https://knocktarget.net/" class="iog-color">Knocktarget</a></p>
            </div>
        </div>
    </div>

    <!-- Modal /login -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">LOG IN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <small id="emailHelp" class="form-text text-muted" style="padding-bottom: 10px;"><a href="forget.html">fogot password</a></small>
                        <button type="submit" class="btn btn-primary float-right">Sign In</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal /sign up -->
    <div class="modal fade" id="exampleModalCentersignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">SIGN UP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputnumber1">Phone number</label>
                            <input type="number" class="form-control" id="exampleInputnumber1" aria-describedby="numberHelp" placeholder="Enter number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



</footer>




<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/index.js"></script>

<script>
    $(function() {
        $('#usr1').datepicker({
            'format': 'yyyy-mm-dd',
            'autoclose': true
        });
    });
</script>





</body>
</html>