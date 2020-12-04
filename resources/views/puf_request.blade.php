@extends('layouts.main')

@section('content')
<link href="{{asset('assets/corporate/css/custom-checkbox.css')}}" rel="stylesheet">
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{route('public.home')}}">Home</a></li>
            <li><a href="{{ route('public.puf',[rtrim(strtr(base64_encode('all'), '+/', '-_'), '=')]) }}">Public Use File</a></li>
            <li class="active">Request</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <form action="{{ URL::to('puf/request') }}" method="POST" id="requested-data">
                    {{ csrf_field() }}
          <div class="col-md-12 col-sm-12">
            <h2>Specific Variable Request</h2>
            <div class="content-page">
               @if(session()->has('message'))
                    <div class="alert alert-success">
                        <i class="far fa-check-circle"></i> {!! session()->get('message') !!}
                    </div>
                @endif
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-7 col-sm-7 blog-posts">
                    <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <h3><a href="javascript:;">{{$puf_request->item_title}}</a></h3>
                      <p>{{$puf_request->item_description}}</p>
                    </div>                 
                     <div class="content-form-page">
                       <div class="row">
                         <div class="col-md-12 col-sm-12">
                             <fieldset>
                               <legend>Check variable/s for your download.</legend>
                               <div class="checkbox form-group">
                                <div class="col-md-12 margin-bottom-20"><input type="checkbox" id="checkAll" data-check-pattern="[id^='key']" /><label for="checkAll" class="lbl" >Check All</label></div>
                                 @foreach ($variable as $label)
                                   <div class="col-md-12 margin-bottom-10">
                                     <input type='checkbox' name="{{$label->variable_name}}" id="key{{$label->variable_name}}" value="{{$label->variable_name}}">
                                     <label for="key{{$label->variable_name}}" class="lbl">{{$label->variable_label}}</label>                                   
                                   </div>
                                 @endforeach
                                 <input type="hidden" name="year" value="{{$puf_request->item_year}}">
                                 <input type="hidden" name="component" value="{{$cmpnt}}">
                               </div>
                             </fieldset>
                           </form>
                         </div>
                       </div>
                     </div>
                    </div>
                    <!-- <hr class="blog-post-sep">    -->
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-5 col-sm-5 pull-right" style="overflow-y: scroll; height:700px;">
                  <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <h2>FNRI Disclaimer User Agreement</h2>
                    <h2>Nutrition Survey Data Public Use Files (PUFs)</h2>
                    <p>The Department of Science and Technology (DOST) - Food and Nutrition Research Institute (FNRI) recognizes the need to provide access to the data collected from the National Nutrition Surveys in accordance with Section III, Article 7 of the Philippine Constitution. This disclaimer-user agreement details the sources and nature of the data. It specifies the responsibility of the data user in processing and understanding the data files.</p>
                    <h2>Access Conditions</h2>
                    <p>Nutrition Survey PUF are accessible online to the public at eNutrition website (enutrition.fnri.dost.gov.ph) in CSV format as free downloads. Data dictionary per component are provided for easy understanding of the different variables included in each dataset. User has to agree to the following terms and conditions before given access to Microdata or PUF:</p>
                    <ol>
                       <li><p>It shall be used for statistical purposes only. It is the responsibility of the user 
                           to identify the variables of interest. Any alterations of the original data, including conversion to other 
                           data formats and data manipulation is the sole responsibility of the user. The DOST-FNRI has no 
                           responsibility for the data after it has been altered, converted or manipulated.</p></li>
                       <li><p>Accessed data shall be solely used for the purpose of the users subject of interest and shall not 
                           be for any malicious validation or investigation against other entities.</p></li>
                       <li><p>Data have been anonymized therefore re-identification of these public datasets is not permitted.</p></li>
                       <li><p>Data user should acknowledge Department of Science and Technology - Food and Nutrition Research Institute as the source of data.</p></li>
                    </ol>
                    <h2>Additional Terms and Conditions</h2>
                    <p>The DOST-FNRI reserves the right to revise, modify or amend this disclaimer-user agreement. Any violation of this agreement shall be subjected to 
                    the penalties as stipulated in the Data Privacy Act.</p>
                    <div class="col-md-12 margin-bottom-20"><input type="checkbox" id="iAgree"/><label for="iAgree" class="lbl" >I Agree to the FNRI Disclaimer - User Agreement</label></div>
                    <div class="form-group">
                      <div class="col-lg-4 col-md-offset-5 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary" id="request" disabled>Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END RIGHT SIDEBAR -->            
              </div>
            </div>
          </div>
          </form>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection