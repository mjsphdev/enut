@extends('layouts.main')

@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Presentations</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h2>Presentations</h2>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                 @foreach ($presentations as $pr)
                    <div class="row">
                    <div class="col-md-2 col-sm-2">
                      <img class="img-responsive" alt="" src="{{asset('assets/corporate/img/logos/pdf.png')}}">
                    </div>
                    <div class="col-md-10 col-sm-10">
                      <h3><a href="{{route('public.presentation-preview',[rtrim(strtr(base64_encode($pr->file_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($pr->file_name), '+/', '-_'), '=')])}}" target="_blank">{{$pr->file_title}}</a></h3>
                      <p>{!!$pr->file_overview!!}</p>
                      <a href="{{route('public.presentation-preview',[rtrim(strtr(base64_encode($pr->file_year), '+/', '-_'), '='), rtrim(strtr(base64_encode($pr->file_name), '+/', '-_'), '=')])}}" target="_blank" class="more">View<i class="icon-angle-right"></i></a>
                    </div>
                    </div>
                    <hr class="blog-post-sep">
                  @endforeach
                  <ul class="pagination">
                  @if($presentations->lastPage() > 1)
                    <li class="{{ ($presentations->currentPage() == 1) ? 'disabled' : '' }}">
                      <a href="{{ ($presentations->currentPage() == 1) ? 'javascript:;' : $presentations->previousPageUrl() }}">Prev</a>
                    </li>
                    @for ($i = 1; $i <= $presentations->lastPage(); $i++)
                       <li class="{{ ($presentations->currentPage() == $i) ? ' active' : '' }}">
                          <a href="{{ $presentations->url($i) }}">{{$i}}</a>
                       </li>
                    @endfor
                    <li class="{{ ($presentations->currentPage() == $presentations->lastPage()) ? ' disabled' : '' }}">
                       <a href="{{ ($presentations->currentPage() == $presentations->lastPage()) ? 'javascript:;' : $presentations->url($presentations->currentPage()+1) }}">Next</a>
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
                    <li class="{{($year == 'all') ? 'active' : ''}}"><a href="{{ route('public.presentation', [rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">All ({{$all}})</a></li>
                    @foreach ($surveys as $survey)
                        <li class="{{($survey->year == $year) ? 'active' : ''}}"><a href="{{ route('public.presentation', [rtrim(strtr(base64_encode($survey->year), '+/', '-_'), '=')]) }}">{{$survey->year}} - {{$survey->survey_type}} ({{$counts[$year_count++]->count}})</a><li>
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