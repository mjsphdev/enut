<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  
  @if(!Route::is('login') && !Route::is('register') && !Route::is('password.request') && !Route::is('password.reset') && !Route::is('home'))
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

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

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
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">

    @include('includes.topbar')

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
    

    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>