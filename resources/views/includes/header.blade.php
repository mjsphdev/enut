    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="{{route('public.home')}}"><img src="{{asset('assets/corporate/img/logos/e.png')}}" alt="eNutrition"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="{{ (Route::is('public.home')) ? 'active' : '' }}"><a href="{{route('public.home')}}">Home</a></li>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Menu            
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4><a href="{{ route('public.factsfigures',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Facts & Figures</a></h4>
                        <ul>
                          @foreach ($ff_surveys as $ff)
                           <li><a href="{{ route('public.factsfigures', [rtrim(strtr(base64_encode($ff->year), '+/', '-_'), '=')]) }}">{{$ff->year}} - {{$ff->survey_type}}</a></li>
				                  @endforeach	  
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4><a href="{{ route('public.presentation',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Presentations</a></h4>
                        <ul>
                          @foreach ($pr_surveys as $pr)
					                 <li><a href="{{ route('public.presentation', [rtrim(strtr(base64_encode($pr->year), '+/', '-_'), '=')]) }}">{{$pr->year}} - {{$pr->survey_type}}</a></li>
				                  @endforeach	  
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                      <h4><a href="{{ route('public.brochure',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Brochure</a></h4>
                        <ul>
                          @foreach ($br_surveys as $br)
					                 <li><a href="{{ route('public.brochure', [rtrim(strtr(base64_encode($br->year), '+/', '-_'), '=')]) }}">{{$br->year}} - {{$br->survey_type}}</a></li>
				                  @endforeach	  
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>

            <li class="{{ (Route::is('public.puf')) ? 'active' : '' }}">
              <a href="{{ route('public.puf',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">
                Public Use File               
              </a>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Policy                 
              </a>
                
              <ul class="dropdown-menu">
                @foreach ($privacies as $privacy)
                  <li><a href="{{ route('public.privacy', ['privacy_title' => $privacy->slug]) }}">{{ $privacy->page_title }}</a></li>
                @endforeach
              </ul>
            </li>

            <li class="{{ (Route::is('public.about')) ? 'active' : '' }}">
              <a href="{{ route('public.about') }}">
                About NNS               
              </a>
            </li>

            <li class="{{ (Route::is('public.contact')) ? 'active' : '' }}">
              <a href="{{ route('public.contact') }}">
                Contact Us             
              </a>
            </li>
            

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->