@extends('layouts.main')

@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li><a href="{{ route('public.puf',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Public Use File</a></li>
            <li class="active">Preview</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h2>Preview</h2>
            <div class="content-page">
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> 
                        <a href="{{ route('register')}}">Create an account</a> or <a href="{{ route('login') }}">Login</a> to your ENUTRITION Account first!
                    </div>
                @endif
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                    <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <h3><a href="javascript:;">{{$singlepuf->item_title}}</a></h3>
                      <p>{!!$singlepuf->item_overview!!}</p>
                    </div>
                    </div>
                    <hr class="blog-post-sep">   
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <h3 class="no-top-space">Actions</h3>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <li><a href="{{route('public.puf-download',[rtrim(strtr(base64_encode($singlepuf->item_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($singlepuf->file_name), '+/', '-_'), '=')])}}" target="_blank"">Download Data Documentation in PDF</a></li>
                    <li><a href="{{route('public.puf-request',[rtrim(strtr(base64_encode($singlepuf->id), '+/', '-_'), '='), rtrim(strtr(base64_encode($singlepuf->item_year), '+/', '-_'), '=')])}}">Specific Variable Request</a></li>
                  </ul>
                  <!-- CATEGORIES END -->
                </div>
                <!-- END RIGHT SIDEBAR -->            
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection