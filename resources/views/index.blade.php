@extends('layouts.main')

@section('content')
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                @for ($carousel = 0; $carousel < count($images); $carousel++)
                <li data-target="#carousel-example-generic" data-slide-to="{{$carousel}}" class="{{ $carousel == 0 ? 'active' : '' }}"></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->

                @for ($carousel = 0; $carousel < count($images); $carousel++)
               <!-- <div class="carousel-item {{ $carousel == 0 ? 'active' : '' }}" style="background-image: url('images/pageimages/carousel/{{$images[$carousel]['image_filename']}}')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>{{$images[$carousel]['image_title']}}</h3>
                     <p>{{$images[$carousel]['image_subtitle']}}</p>
                  </div>
               </div> -->

               <div class="item {{ $carousel == 0 ? 'active' : '' }}" style="background-image: url('{{config('images.base_url'). $images[$carousel]['image_filename']}}'); background-size:cover; background-position:center center">
                    <div class="container">
                        <div class="carousel-position-six text-uppercase text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v5" data-animation="animated fadeInDown">
                            <!-- {{$images[$carousel]['image_title']}}<br/>
                                <span class="carousel-title-normal">{{$images[$carousel]['image_subtitle']}}</span>
                            </h2>
                            <p class="carousel-subtitle-v5 border-top-bottom margin-bottom-30" data-animation="animated fadeInDown">This is what you were looking for</p>
                            <a class="carousel-btn-green" href="#" data-animation="animated fadeInUp">Purchase Now!</a> -->
                        </div>
                    </div>
                </div>
               @endfor
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">

        <!-- BEGIN TABS AND TESTIMONIALS -->
        <div class="row mix-block margin-bottom-40">
          <!-- TABS -->
          <div class="col-md-7 tab-style-1">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-1" data-toggle="tab">Welcome</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane row fade in active" id="tab-1">
                <div class="col-md-12 col-sm-12">
                  <p class="margin-bottom-10">{!!$content->page_content!!}</p>
                  <!-- <p><a class="more" href="javascript:;">Read more <i class="icon-angle-right"></i></a></p> -->
                </div>
              </div>
            </div>
          </div>
          <!-- END TABS -->
        
          <!-- TESTIMONIALS -->
          <div class="col-md-5 testimonials-v1">
            <div id="myCarousel" class="carousel slide">
            <h3><a href="javascript:;">Announcements</a></h3>
              <!-- Carousel items -->
              <div class="carousel-inner">
                @for($announce = 0; $announce < count($announcements); $announce++ )
                <div class="{{ $announce == 0 ? 'active' : '' }} item">
                  <blockquote><p>{!!  str_limit($announcements[$announce]['content'], 300, '') !!}
                  @if(strlen($announcements[$announce]['content']) > 300)
                      <span id="dots">...</span>
                      <span id="more">{!! substr($announcements[$announce]['content'], 300) !!}</span>
                  @endif
                  <button onclick="readMore()" id="moreBtn" class="btn btn-primary btn-sm">Read more</button>
                  </p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/pages/img/people/img1-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">{{$announcements[$announce]['title']}}</span>
                      <span class="testimonials-post">{{Carbon\Carbon::parse($announcements[$announce]['created_at'])->diffForHumans()}}</span>
                    </div>
                  </div>
                </div>
                @endfor
                <!-- <div class="item">
                  <blockquote><p>Raw denim you Mustache cliche tempor, williamsburg carles vegan helvetica probably haven't heard of them jean shorts austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/pages/img/people/img5-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Kate Ford</span>
                      <span class="testimonials-post">Commercial Director</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <blockquote><p>Reprehenderit butcher stache cliche tempor, williamsburg carles vegan helvetica.retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/pages/img/people/img2-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Jake Witson</span>
                      <span class="testimonials-post">Commercial Director</span>
                    </div>
                  </div>
                </div> -->
              </div>

              <!-- Carousel nav -->
              <a class="left-btn" href="#myCarousel" data-slide="prev"></a>
              <a class="right-btn" href="#myCarousel" data-slide="next"></a>
            </div>
          </div>
          <!-- END TESTIMONIALS -->
        </div>                
        <!-- END TABS AND TESTIMONIALS -->

        <!-- BEGIN STEPS -->
        <!-- <div class="row margin-bottom-40 front-steps-wrapper front-steps-count-3">
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step1">
              <h2>Goal definition</h2>
              <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step2">
              <h2>Analyse</h2>
              <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 front-step-col">
            <div class="front-step front-step3">
              <h2>Implementation</h2>
              <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
            </div>
          </div>
        </div> -->
        <!-- END STEPS -->

        <!-- BEGIN CLIENTS -->
        <div class="row margin-bottom-40 our-clients">
          <div class="col-md-3">
            <h2><a href="javascript:;">Other Links</a></h2>
            <!-- <p>Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p> -->
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel6-brands">
              <div class="client-item">
                <a href="javascript:;">
                  <img src="{{asset('assets/img/logo/ff_gray.png')}}" class="img-responsive" alt="">
                  <img src="{{asset('assets/img/logo/ff.png')}}" class="color-img img-responsive" alt="">
                </a>
              </div>
              <div class="client-item">
                <a href="javascript:;">
                  <img src="{{asset('assets/img/logo/pr_gray.png')}}" class="img-responsive" alt="">
                  <img src="{{asset('assets/img/logo/pr.png')}}" class="color-img img-responsive" alt="">
                </a>
              </div>
              <div class="client-item">
                <a href="javascript:;">
                  <img src="{{asset('assets/img/logo/puf_gray.png')}}" class="img-responsive" alt="">
                  <img src="{{asset('assets/img/logo/puf.png')}}" class="color-img img-responsive" alt="">
                </a>
              </div>
              <div class="client-item">
                <a href="javascript:;">
                  <img src="{{asset('assets/img/logo/rda_gray.png')}}" class="img-responsive" alt="">
                  <img src="{{asset('assets/img/logo/rda.png')}}" class="color-img img-responsive" alt="">
                </a>
              </div>
              <div class="client-item">
                <a href="javascript:;">
                  <img src="{{asset('assets/img/logo/ifnri_gray.png')}}" class="img-responsive" alt="">
                  <img src="{{asset('assets/img/logo/ifnri.png')}}" class="color-img img-responsive" alt="">
                </a>
              </div>   
            </div>
          </div>          
        </div>
        <!-- END CLIENTS -->
      </div>
    </div>
@endsection
