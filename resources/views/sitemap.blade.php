@extends('layouts.main')

@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Site Map</li>
        </ul>
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Site Map</h1>
            <div class="content-page">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <h2>Data Files</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.factsfigures',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Facts & Figures</a>
                        <ul class="list-unstyled">
                           @foreach ($ff_surveys as $ff)
                            <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.factsfigures', [rtrim(strtr(base64_encode($ff->year), '+/', '-_'), '=')]) }}">{{$ff->year}} - {{$ff->survey_type}}</a></li>
                           @endforeach
                        </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.presentation',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Presentations</a>
                        <ul class="list-unstyled">
                            @foreach ($pr_surveys as $pr)
					          <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.presentation', [rtrim(strtr(base64_encode($pr->year), '+/', '-_'), '=')]) }}">{{$pr->year}} - {{$pr->survey_type}}</a></li>
				            @endforeach	  
                        </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.brochure',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Brochure</a>
                        <ul class="list-unstyled">
                            @foreach ($br_surveys as $br)
					          <li><i class="fa fa-angle-right"></i><a href="{{ route('public.brochure', [rtrim(strtr(base64_encode($br->year), '+/', '-_'), '=')]) }}">{{$br->year}} - {{$br->survey_type}}</a></li>
				            @endforeach	  
                        </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{ route('public.puf',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Public Use File</a>
                        <ul class="list-unstyled">
                            @foreach ($surveys as $survey)
					          <li><i class="fa fa-angle-right"></i><a href="{{ route('public.puf', [rtrim(strtr(base64_encode($survey->year), '+/', '-_'), '=')]) }}">{{$survey->year}} - {{$survey->survey_type}}</a></li>
				            @endforeach	  
                        </ul>
                    </li>
                  </ul>
                </div>

                <div class="col-md-4 col-sm-4">
                  <h2>Information</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('login')}}">Login</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('register')}}">Registration</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('password.request')}}">Reset Password</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('home')}}">My Account</a>
                      <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right"></i> <a href="{{route('home')}}">Account Information</a></li>
                      </ul>
                    </li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('public.about')}}">About NNS</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('public.acknowledgement')}}">Acknowledgement</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('public.faq')}}">Frequently Asked Questions</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="{{route('public.contact')}}">Contact Us</a></li>
                  </ul>
                </div>

                <div class="col-md-4 col-sm-4">
                  <h2>Futures</h2>
                  <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Search</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Dataset Request History</a></li>
                  </ul>
                </div>

              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>
@endsection