@extends('layouts.main')

@section('content')

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Brochure</li>
        </ul>

         <!-- BEGIN SIDEBAR & CONTENT -->
         <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12">
            <h1>Gallery</h1>
            <div class="content-page">
              <div class="row margin-bottom-40">
               @foreach($brochure as $br)
                <div class="col-md-3 col-sm-4 gallery-item">
                  <a data-rel="fancybox-button" href="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_thumbnail }}" class="fancybox-button">
                    <img alt="" src="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_thumbnail }}" class="img-responsive">
                    <div class="zoomix"><i class="fa fa-search"></i></div>
                  </a> 
                  <a class="btn btn-primary text-color" href="{{ route('public.brochure', [rtrim(strtr(base64_encode($br->brochure_year), '+/', '-_'), '=')]) }}">View More <i class="fa fa-eye"></i></a>
                </div>    
                @endforeach
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
      </div>
    </div>
@endsection