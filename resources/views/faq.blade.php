@extends('layouts.main')

@section('content')

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li><a href="{{route('public.about')}}">About Us</a></li>
            <li class="active">FAQs</li>
        </ul>

         <!-- BEGIN SIDEBAR & CONTENT -->
         <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Frequently Asked Questions</h1>
            <div class="content-page">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <ul class="tabbable faq-tabbable">
                    <li class="active"><a href="#tab_1" data-toggle="tab">General Questions</a></li>
                  </ul>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="tab-content" style="padding:0; background: #fff;">
                      <!-- START TAB 1 -->
                      <div class="tab-pane active" id="tab_1">
                        @foreach($faqs as $faq)
                         <div class="panel-group" id="accordion{{$faq->id}}">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a href="#accordion1_{{$faq->id}}" data-parent="#accordion{{$faq->id}}" data-toggle="collapse" class="accordion-toggle">
                                     {{$faq->question}}
                                     </a>
                                  </h4>
                               </div>
                               <div class="panel-collapse collapse in" id="accordion1_{{$faq->id}}">
                                  <div class="panel-body">
                                     {{$faq->answer}}
                                  </div>
                               </div>
                            </div>
                         </div>
                        @endforeach
                      </div>
                      <!-- END TAB 1 -->
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>
@endsection