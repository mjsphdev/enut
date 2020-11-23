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
             <div class="col-md-9 col-sm-9 blog-posts">
              <div class="row margin-bottom-40">
               @foreach($brochure as $br)
               @if($year == "all")
                <div class="col-md-3 col-sm-4 gallery-item">
                  <a data-rel="fancybox-button" href="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_thumbnail }}" class="fancybox-button">
                    <img alt="" src="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_thumbnail }}" class="img-responsive">
                    <div class="zoomix"><i class="fa fa-search"></i></div>
                  </a> 
                  <a class="btn btn-primary text-color" href="{{ route('public.brochure', [rtrim(strtr(base64_encode($br->brochure_year), '+/', '-_'), '='), rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">View More <i class="fa fa-eye"></i></a>
                </div>    
                @else
                <div class="col-md-3 col-sm-4 gallery-item">
                  <a data-rel="fancybox-button" href="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_group . '/' . $br->brochure_filename }}" class="fancybox-button">
                    <img alt="" src="{{config('br.base_url'). $br->brochure_year . '/'. $br->brochure_group . '/' . $br->brochure_filename }}" class="img-responsive">
                    <div class="zoomix"><i class="fa fa-search"></i></div>
                  </a> 
                </div>    
                @endif
                @endforeach
              </div>
             </div>
             </div>
             @if($year != "all")
             <!-- BEGIN RIGHT SIDEBAR -->            
             <div class="col-md-3 col-sm-3 blog-sidebar">
               <!-- CATEGORIES START -->
               <h3 class="no-top-space">Nutrition Surveys</h3>
               <ul class="nav sidebar-categories margin-bottom-40">
                 @foreach($surveys as $survey)
                   <li class="{{($survey->year == $year) ? 'active' : ''}}"><a href="{{ route('public.brochure', [rtrim(strtr(base64_encode($survey->year), '+/', '-_'), '='), rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">{{$survey->year}} - {{$survey->survey_type}}</a><li>
				         @endforeach	  
               </ul>

               <h3 class="no-top-space">Select by Group</h3>
               <ul class="nav sidebar-categories margin-bottom-40">
                 <li class="{{($grp == 'all') ? 'active' : ''}}"><a href="{{ route('public.brochure', [rtrim(strtr(base64_encode($currentYear), '+/', '-_'), '='), rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">All</a><li>
                 @foreach($groups as $group)
                   <li class="{{($group->brochure_group == $grp) ? 'active' : ''}}"><a href="{{ route('public.brochure', [rtrim(strtr(base64_encode($group->brochure_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($group->brochure_group), '+/', '-_'), '=')]) }}">{{$group->brochure_group}}</a><li>
				         @endforeach	  
               </ul>
               <!-- CATEGORIES END -->
             </div>
             <!-- END RIGHT SIDEBAR -->      
             @endif
          </div>
          <!-- END CONTENT -->
      </div>
    </div>
@endsection