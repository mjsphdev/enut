<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eNutrition | 404</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <link rel="shortcut icon" href="{{asset('assets/img/icon/e-icon.png')}}">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Global styles END --> 

  <!-- Theme styles START -->
  <link href="{{asset('assets/pages/css/components.css')}}" rel="stylesheet">
  <link href="{{asset('assets/pages/css/slider.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/style-responsive.css')}}" rel="stylesheet">
  <link href="{{asset('assets/corporate/css/themes/blue.css')}}" rel="stylesheet" id="style-color">
  <link href="{{asset('assets/corporate/css/custom.css')}}" rel="stylesheet">
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

    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <div class="content-page page-404">
               <div class="number">
                  404
               </div>
               <div class="details">
                  <h3>Oops!  You're lost.</h3>
                  <p>
                     We can not find the page you're looking for.<br>
                     <a href="{{route('home')}}" class="link">Return home</a> or try the search bar below.
                  </p>
               </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

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