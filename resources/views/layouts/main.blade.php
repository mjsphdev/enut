<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  @if(!Route::is('login') && !Route::is('register') && !Route::is('password.request') && !Route::is('password.reset') && !Route::is('home') && !Route::is('404'))
  <title>{{{ $title == '' ? 'eNutrition' : 'eNutrition'.' | '.$title }}}</title>
  @elseif(Route::is('login'))
  <title>Login</title>
  @elseif(Route::is('register'))
  <title>Register</title>
  @elseif(Route::is('password.request'))
  <title>Send Reset Password Link</title>
  @elseif(Route::is('password.reset'))
  <title>Reset Password</title>
  @elseif(Route::is('home'))
  <title>My Account</title>
  @endif

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta property="og:title" content="eNutrition - Food and Nutrition Research Institute" />
  <meta property="og:url" content="{{route('public.home')}}" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="{{asset('assets/corporate/img/logos/e.png')}}"/>
  <meta property="og:description"
        content="The eNutrition website is the data warehouse of the National Nutrition Survey (NNS) 
  		providing electronically accessible information on individual's growth and body composition, 
  		biomarkers, food and nutrient intake, health and other related indicators which are useful 
  		inputs in crafting and/or reviewing policies and programs on food, nutrition, health, agriculture 
  		and social services."
  />
  <meta name="keywords" content="DOST, FNRI, DOST-FNRI, Food and Nutrition Research Institute, Department of Science and Technology, National Nutrition Survey, NNS, ENNS, eNutrition" />

  <link rel="shortcut icon" href="{{asset('assets/img/icon/e-icon.png')}}">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" />
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="{{asset('assets/pages/css/animate.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="{{asset('assets/pages/css/components.css')}}" rel="stylesheet">
  <link href="{{asset('assets/pages/css/slider.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/themes/blue.css')}}" rel="stylesheet" id="style-color">
  <link href="{{asset('assets/corporate/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet">
  <link href="{{asset('assets/pages/css/gallery.css')}}" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
    @include('includes.topbar')
    <div class="container-fluid timeclass">
     <div class="container padding-top-10 margin-bottom-10">
        <div>Philippine Standard Time:</div>
        <div id="pst-time" class=" "></div>
     </div>
    </div>
    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var top_url = '{{ URL::asset("assets/corporate/img/up.png") }}'
    </script>
    <script src="{{asset('assets/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>      
    <script src="{{asset('assets/corporate/scripts/back-to-top.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->
    <script src="{{asset('assets/plugins/owl.carousel/owl.carousel.min.js')}}" type="text/javascript"></script><!-- slider for products -->

    <script src="{{asset('assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/bs-carousel.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script><!-- pop up -->

    <script src="{{asset('assets/corporate/scripts/layout.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling();
        });
        var url = '{{ URL::asset("assets/corporate/img/up.png") }}'
    </script>

    <script type="text/javascript" id="gwt-pst">
    (function(d, eId) {
    	var js, gjs = d.getElementById(eId);
    	js = d.createElement('script'); js.id = 'gwt-pst-jsdk';
    	js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
    	gjs.parentNode.insertBefore(js, gjs);
    }(document, 'gwt-pst'));
    </script>
    

    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>