@extends('layouts.main')

@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li class="active">Public Use File</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h2>Public Use File</h2>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                 @foreach ($puf_items as $puf)
                    <div class="row">
                    <div class="col-md-2 col-sm-2">
                      <img class="img-responsive" alt="" src="{{asset('assets/corporate/img/logos/puf.png')}}">
                    </div>
                    <div class="col-md-10 col-sm-10">
                      <h3><a href="{{route('public.puf-preview',[rtrim(strtr(base64_encode($puf->id), '+/', '-_'), '='), rtrim(strtr(base64_encode($puf->item_year), '+/', '-_'), '=')])}}">{{$puf->item_title}}</a></h3>
                      <p>{{$puf->item_description}}</p>
                      <a href="{{route('public.puf-preview',[rtrim(strtr(base64_encode($puf->id), '+/', '-_'), '='), rtrim(strtr(base64_encode($puf->item_year), '+/', '-_'), '=')])}}" class="more">View<i class="icon-angle-right"></i></a>
                    </div>
                    </div>
                    <hr class="blog-post-sep">
                  @endforeach
                  <ul class="pagination">
                  @if($puf_items->lastPage() > 1)
                    <li class="{{ ($puf_items->currentPage() == 1) ? 'disabled' : '' }}">
                      <a href="{{ ($puf_items->currentPage() == 1) ? 'javascript:;' : $puf_items->previousPageUrl() }}">Prev</a>
                    </li>
                    @for ($i = 1; $i <= $puf_items->lastPage(); $i++)
                       <li class="{{ ($puf_items->currentPage() == $i) ? ' active' : '' }}">
                          <a href="{{ $puf_items->url($i) }}">{{$i}}</a>
                       </li>
                    @endfor
                    <li class="{{ ($puf_items->currentPage() == $puf_items->lastPage()) ? ' disabled' : '' }}">
                       <a href="{{ ($puf_items->currentPage() == $puf_items->lastPage()) ? 'javascript:;' : $puf_items->url($puf_items->currentPage()+1) }}">Next</a>
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
                    <li class="{{($pufyear == 'all') ? 'active' : ''}}"><a href="{{ route('public.puf', [rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">All ({{$all}})</a></li>
                    @foreach ($surveys as $survey)
                        <li class="{{($survey->year == $pufyear) ? 'active' : ''}}"><a href="{{ route('public.puf', [rtrim(strtr(base64_encode($survey->year), '+/', '-_'), '=')]) }}">{{$survey->year}} - {{$survey->survey_type}} ({{count($counts[$survey->year])}})</a><li>
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