@extends('layouts.main')

@section('content')

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li><a href="{{route('public.about')}}">About Us</a></li>
            <li class="active">Acknowledgement</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Acknowledgement</h1>
            <div class="content-page">
              <div class="row margin-bottom-20">
                <!-- BEGIN INFO BLOCK -->               
                <div class="col-md-7">
                  <p>{!!$content->page_content!!}</p> 
                </div>
                <!-- END INFO BLOCK -->   

                <!-- BEGIN CAROUSEL -->            
                <div class="col-md-5 front-carousel">
                  <div id="myCarousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="assets/pages/img/pics/bldg3.jpg" alt="">
                        <div class="carousel-caption">
                          <p>DOST - Food and Nutrition Research Institute</p>
                        </div>
                      </div>
                    </div>
                  </div>                
                </div>
                <!-- END CAROUSEL -->
              </div>

            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      </div>
</div>
@endsection