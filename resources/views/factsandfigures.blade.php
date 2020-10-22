@extends('layouts.main')
@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Facts & Figures</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h2>Facts and Figures</h2>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                  @foreach($factsandfigures as $ff)
                    <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <img class="img-responsive" alt="" src="{{config('ff.base_url'). $ff->file_year . '/Facts&Figures/Thumbnail/'. $ff->file_thumbnail }}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                      <h3><a href="{{route('public.ff-preview',[rtrim(strtr(base64_encode($ff->file_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($ff->file_name), '+/', '-_'), '=')])}}" target="_blank">{{$ff->file_title}}</a></h3>
                      <p>{!!$ff->file_overview!!}</p>
                      <a href="{{route('public.ff-preview',[rtrim(strtr(base64_encode($ff->file_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($ff->file_name), '+/', '-_'), '=')])}}" target="_blank" class="more">View<i class="icon-angle-right"></i></a>
                    </div>
                    </div>
                    <hr class="blog-post-sep">
                  @endforeach
                  <ul class="pagination">
                  @if($factsandfigures->lastPage() > 1)
                    <li class="{{ ($factsandfigures->currentPage() == 1) ? ' disabled' : '' }}">
                      <a href="{{ ($factsandfigures->currentPage() == 1) ? ' javascript:;' : $factsandfigures->previousPageUrl() }}">Prev</a>
                    </li>
                    @for ($i = 1; $i <= $factsandfigures->lastPage(); $i++)
                       <li class="{{ ($factsandfigures->currentPage() == $i) ? ' active' : '' }}">
                          <a href="{{ $factsandfigures->url($i) }}">{{$i}}</a>
                       </li>
                    @endfor
                    <li class="{{ ($factsandfigures->currentPage() == $factsandfigures->lastPage()) ? ' disabled' : '' }}">
                       <a href="{{ ($factsandfigures->currentPage() == $factsandfigures->lastPage()) ? 'javascript:;' : $factsandfigures->url($factsandfigures->currentPage()+1) }}">Next</a>
                    </li>
                  @endif
                  </ul>               
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <h3 class="no-top-space">Nutrition Surveys</h3>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <li class="{{($year == 'all') ? 'active' : ''}}"><a href="{{ route('public.factsfigures', [rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">All ({{$all}})</a></li>
                    @foreach($surveys as $survey)
                        <li class="{{($survey->year == $year) ? 'active' : ''}}"><a href="{{ route('public.factsfigures', [rtrim(strtr(base64_encode($survey->year), '+/', '-_'), '=')]) }}">{{$survey->year}} - {{$survey->survey_type}} ({{$counts[$year_count++]->count}})</a><li>
				            @endforeach	  
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