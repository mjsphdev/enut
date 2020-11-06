<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\PageContent;
use App\ImageContent;
use App\Announcement;
use App\BrochureCategory;
use App\Files;
use App\UserRequested;
use DB;
use Zipper;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Storage;
use Crypt;
use Response;
use Auth;
use File;

class PageController extends Controller
{
    public function index()
    {
        $content = PageContent::where('slug', 'home')
                   ->firstOrFail(['id', 'page_title', 'page_content', 'slug']);

        $images = ImageContent::where('image_slug', 'home')->where('status', 1)->where('image_type', 'carousel')
                  ->get(['id', 'image_title', 'image_subtitle', 'image_filename'])->toArray();

        $announcements = Announcement::get()->toArray();

        return view('index', compact('content', 'images', 'announcements'))->with(['title' => 'Home']);
    }

    public function factsandfigures($year)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        if($year=='all'){
            $factsandfigures = Files::where('file_category', 'FactsandFigures')
                               ->get(['id','file_title', 'file_overview', 'file_year','file_name','file_category', 'file_thumbnail'])->paginate(1);
        }
        else{
            $factsandfigures = Files::where('file_category', 'FactsandFigures')->where('file_year', $year)
                               ->get(['id','file_title', 'file_overview', 'file_year','file_name','file_category', 'file_thumbnail'])->paginate(1);
        }

        $surveys = DB::table('files')->where('file_category', 'FactsandFigures')->join('surveys', 'surveys.year', '=', 'files.file_year')
                   ->select('surveys.year', 'surveys.survey_type')->distinct('surveys.year')->get();
        
        $all = count(DB::table('files')->where('file_category', 'FactsandFigures')->get());

        $counts = DB::table('files')
            ->select("file_year" ,DB::raw("(COUNT(*)) as count"))
            ->where('file_category', 'FactsandFigures')
            ->groupBy(DB::raw("file_year"))
            ->orderBy(DB::raw("file_year"), 'DESC')
            ->get(['year' => 'file_year', 'count' => 'count'])->toArray();

        $year_count = 0;

        return view('factsandfigures', compact('factsandfigures', 'surveys', 'year', 'all', 'counts', 'year_count'))->with(['title' => 'Facts & Figures']);
    }

    public function factsandfigures_preview($year, $filename)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        header("Content-type: application/pdf");

        $filename = base64_decode(str_pad(strtr($filename, '-_', '+/'), strlen($filename) % 4, '='));

        $filepath = config('ff.base_url').$year.'/'.'Facts&Figures/'.$filename;

        $response = Response::make(readfile($filepath), 200);

        $response->header('Content-Type', 'application/pdf');

        return $response;
    }

    public function presentation($year)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        if($year=='all'){
            $presentations = Files::where('file_category', 'Presentation')
                             ->get(['id','file_title','file_year','file_name','file_category'])->paginate(1);
        }
        else{
            $presentations = Files::where('file_category', 'Presentation')->where('file_year', $year)
                             ->get(['id','file_title','file_year','file_name','file_category'])->paginate(1);
        }

        $surveys = DB::table('files')->where('file_category', 'Presentation')->join('surveys', 'surveys.year', '=', 'files.file_year')
                   ->select('surveys.year', 'surveys.survey_type')->distinct('surveys.year')->get();

        $all = count(DB::table('files')->where('file_category', 'Presentation')->get());

        $counts = DB::table('files')
            ->select("file_year" ,DB::raw("(COUNT(*)) as count"))
            ->where('file_category', 'Presentation')
            ->groupBy(DB::raw("file_year"))
            ->orderBy(DB::raw("file_year"), 'DESC')
            ->get(['year' => 'file_year', 'count' => 'count'])->toArray();

        $year_count = 0;

        return view('presentation', compact('presentations', 'surveys', 'year', 'counts', 'all', 'year_count'))->with(['title' => 'Presentation']);
    }
    
    public function presentation_preview($year, $filename)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        header("Content-type: application/pdf");

        $filename = base64_decode(str_pad(strtr($filename, '-_', '+/'), strlen($filename) % 4, '='));

        $filepath = config('ff.base_url').$year.'/'.'Presentation/'.$filename;

        $response = Response::make(readfile($filepath), 200);

        $response->header('Content-Type', 'application/pdf');

        return $response;
    }



    public function about()
    {
        $content = PageContent::where('slug', 'about-nns')->firstOrFail(['id', 'page_title', 'page_content', 'slug']);
        return view('about', compact('content'))->with(['title' => 'About']);
    }

    public function contact()
    {
        return view('contact')->with(['title' => 'Contact']);
    }

    public function privacy($page_title)
    {
        $content = PageContent::where('slug', $page_title)->firstOrFail(['id', 'page_title', 'page_content', 'slug']);
        return view('privacy', compact('content'))->with(['title' => $page_title == 'privacy-policy' ? 'Privacy Policy' : 'Data Access Policy']);
    }

    public function puf($pufyear)
    {
        $pufyear = base64_decode(str_pad(strtr($pufyear, '-_', '+/'), strlen($pufyear) % 4, '='));
        $years = DB::table('surveys')->orderBy('year', 'DESC')->get(['year']);
        $puf = new Collection;
        foreach($years as $year){
            try{
                $result = DB::table('nns_'.$year->year.'.puf_items')->get();
                $puf = $puf->concat($result);
            }
            catch(\Exception $e){
                
            }
        }

        $surveys = new Collection;
        foreach($puf as $puf_year){
            try{
                $year_results = DB::table('surveys')->where('year', $puf_year->item_year)->get();
                $surveys = $surveys->concat($year_results);
            }
            catch(\Exception $e){
                
            }
            
        }
        if($pufyear == 'all'){
            $puf_items = $puf->paginate(2);
        }
        else{
            $puf_items = $puf->where('item_year', $pufyear)->paginate(2);
        }

        $all = count($puf);

        $counts = $puf->groupBy("item_year");

        return view('puf', compact('puf_items', 'surveys', 'pufyear', 'counts', 'all'))->with(['title' => 'PUF']);
    }

    public function puf_preview($id,$year){
        $id = base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '='));
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));
        $singlepuf = DB::table('nns_'.$year.'.puf_items')->where('id', $id)->where('item_year', $year)->first();       
        return view('puf_preview', compact('singlepuf'))->with(['title' => 'PUF-Preview']);
    }

    public function puf_download($year, $filename)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        header("Content-type: application/pdf");

        $filename = base64_decode(str_pad(strtr($filename, '-_', '+/'), strlen($filename) % 4, '='));

        $filepath = config('puf.base_url').$year.'/'.$filename;

        $response = Response::make(readfile($filepath), 200);

        $response->header('Content-Type', 'application/pdf');

        return $response;
    }

    public function puf_request($id, $year){
        if(!Auth::check()){
            return redirect()->back()->with('message', '<a href="{{route("register")}}">Create an account</a> or <a href="{{ route("login") }}">Login</a> to your ENUTRITION Account first!');
        }
        $id = base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '='));
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));
        $puf_request = DB::table('nns_'.$year.'.puf_items')->where('id', $id)->first();
        $component = $puf_request->item_survey.'_'.$puf_request->item_year;

        $cmpnt = $puf_request->item_survey;

        $variable = DB::table('variable_label_'.$year)->where('formno', $component)->get();
        return view('puf_request', compact('variable', 'puf_request', 'cmpnt'))->with(['title' => 'PUF-Request']);
    }

    function component_description($cmpnt)
    {
        if($cmpnt == 'form21')
        {
            $component_name = 'Anthropometric-Component';
        }
        elseif($cmpnt == 'form82')
        {
            $component_name = 'Biochemical-Component';
        }
        elseif($cmpnt == 'form71')
        {
            $component_name = 'Clinical-Component';
        }
        elseif($cmpnt == 'form5')
        {
            $component_name = 'Dietary-Component(Household)';
        }
        elseif($cmpnt == 'form61')
        {
            $component_name = 'Dietary-Component(Individual)';
        }
        elseif($cmpnt == 'form15' || $cmpnt == 'form16')
        {
            $component_name = 'Food-Security-Component';
        }
        elseif($cmpnt == 'form43')
        {
            $component_name = 'Infant-and-Young-Child-Feeding-Component';
        }
        elseif($cmpnt == 'form31')
        {
            $component_name = 'Maternal-Health-and-Nutrition-Component';
        }
        elseif($cmpnt == 'form12')
        {
            $component_name = 'Socio-Economic-Component(Household)';
        }
        elseif($cmpnt == 'form11')
        {
            $component_name = 'Socio-Economic-Component(Individual)';
        }

     return $component_name;
    }

    function year_component($puf_component, $year)
    {
         if($year == 2008)
         {
             $db = 'nns_'.$year.'.'.$puf_component;
         }
         elseif($year == 2011)
         {
            $db = 'nns_'.$year.'.'.$puf_component;
         }
         elseif($year == 2013)
         {
            $db = 'nns_'.$year.'.'.$puf_component;
         }
         elseif($year == 2015)
         {
            $db = 'nns_'.$year.'.'.$puf_component;
         }

      return $db;
    }

    function valuelabel_component($year)
    {
        $vl_component_name = 'nns_'.$year.'.value_label';
        
        return $vl_component_name;
    }

    public function pufSpecificVariable(Request $request)
    {
       $cmpnt_no = $request->component;
       $year = $request->year;
       $puf = $cmpnt_no.'_'.'puf';
       $user = Auth::user();
       DB::disableQueryLog();
       $now = Carbon::now();
       $date = $now->toDateString();
       $time = $now->toTimeString();
       $time = str_replace(':', '', $time);
       $first_name = $user->firstname;
       $last_name = $user->lastname;
       $user_id = $user->id;
       $name = $first_name. '-' . $last_name;
       $name = preg_replace('/\s+/', '-', $name);
       $email = $user->email;
       $combined = $name. '-' . $date;
       $combined = $combined. '-' .$time;
       $dt = $date. '-' . $time;
       
       $component = $this->component_description($cmpnt_no);
       $dbyear_component = $this->year_component($puf, $year);
       $vl_component = $this->valuelabel_component($year);
       $value_label_component = $cmpnt_no.'_'.$year;

       //dataset
       $req = DB::table($dbyear_component)->get($request->except('_token', 'year', 'component'));
       $req = json_decode(json_encode($req), true);
       array_unshift($req, array_keys($req[0]));
       $path = storage_path('Csv'.'/'.$combined);
       File::makeDirectory($path);

       $FH = fopen(storage_path('Csv'.'/'.$combined.'/'.$combined.'-'.$component.'-dataset.'.'csv'), "w") or die("Unable to open file!");
       foreach ($req as $row) { 
           fputcsv($FH, $row);
       }
       fclose($FH);

       //data_dictionary
       $value_label = DB::table($vl_component)->where('formno', $value_label_component)->get(['formno', 'variable_name', 'variable_label', 'var_value', 'value_label']);
       $value_label = json_decode(json_encode($value_label), true);
       $columns = array('formno', 'variable_name', 'variable_label', 'var_value', 'value_label');

       $dictionary = fopen(storage_path('Csv'.'/'.$combined.'/'.$combined.'-'.$component.'-data-dictionary.'.'csv'), "w") or die("Unable to open file!");
       fputcsv($dictionary, $columns);
       foreach ($value_label as $row) { 
           fputcsv($dictionary, $row);
       }
       fclose($dictionary);
      
      $files = glob(storage_path('Csv/'.$combined.'/'));
      Zipper::make(storage_path('Zip'.'/'.$combined.'-'.$component.'.zip'))->add($files);
      $zip_file = $combined.'-'.$component.'.zip';
      $name = str_replace('-',' ',$name);
      UserRequested::create([
        'name' => $name,
        'email' => $email,
        'gender' => $user->gender,
        'country' => $user->country, 
        'company' => $user->company, 
        'data_requested' => $component, 
        'date' => $dt,
        'zip_file' => $zip_file

      ]);

      return redirect()->back()->with('message', 'Dataset Requested Successfully');

    }


}
