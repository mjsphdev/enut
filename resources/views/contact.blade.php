@extends('layouts.main')

@section('content')
<div id="overlay">
	<div class="cv-spinner">
		<span class="spinner"></span>
	</div>
</div>
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Contact Us</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
           
            <div class="content-page">
              <!-- BEGIN CAROUSEL -->            
              <div class="front-carousel margin-bottom-20">
                <div id="myCarousel" class="carousel slide">
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                    <div class="item active">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=dost%20fnri&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style></div>
                    </div>
                </div>
              </div>                
            </div>
            <!-- END CAROUSEL --> 

                    <!-- BEGIN LISTS -->
                    <div class="row front-lists-v1">
                        <div class="col-md-12">
                        <h2 class="padding-top-20">Contact Form</h2>
                        <!-- BEGIN FORM-->
                            <form method="post" action="{{ route('public.send.email')}}" id="send-email">
                               {{ csrf_field() }}  
                              <div class="control-group form-group">
                                <div class="controls">
                                  <label>Full Name:</label>
                                  <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                                  <p class="help-block"></p>
                                </div>
                              </div>
                              <div class="control-group form-group">
                                <div class="controls">
                                  <label>Email Address:</label>
                                  <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                                </div>
                              </div>
                              <div class="control-group form-group">
                                <div class="controls">
                                  <label>Message:</label>
                                  <textarea rows="5" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                </div>
                              </div>
                              <div id="success"></div>
                              <!-- For success/fail messages -->
                              <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                    <!-- END LISTS -->
                    <!-- END INFO BLOCK -->
             
            </div>
          </div>

          <div class="col-md-3 col-sm-3 sidebar2">
            <h2 class="padding-top-30">Contact Details</h2>
            <address>
              <strong>DOST-FNRI,</strong><br>
              DOST Compound, Bicutan<br>
              Taguig City, Philippines<br>
              <abbr title="Phone">P:</abbr> 837-2934, 837-2071 to 81 loc 2284
            </address>
            <address>
              <strong>Email</strong><br>
              <a href="mailto:enutrition.fnri@gmail.com">enutrition.fnri@gmail.com</a><br>
            </address>

            <!-- END FORM-->                                     
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection