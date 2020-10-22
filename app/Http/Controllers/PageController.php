<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use App\PageContent;
use App\ImageContent;
use App\BrochureCategory;
use App\File;
use DB;
use Crypt;
use Response;

class PageController extends Controller
{
    public function index()
    {
        $content = PageContent::where('slug', 'home')
                   ->firstOrFail(['id', 'page_title', 'page_content', 'slug']);

        $images = ImageContent::where('image_slug', 'home')->where('status', 1)->where('image_type', 'carousel')
                  ->get(['id', 'image_title', 'image_subtitle', 'image_filename'])->toArray();

        return view('index', compact('content', 'images'))->with(['title' => 'Home']);
    }

    public function factsandfigures($year)
    {
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));

        if($year=='all'){
            $factsandfigures = File::where('file_category', 'FactsandFigures')
                               ->get(['id','file_title', 'file_overview', 'file_year','file_name','file_category', 'file_thumbnail'])->paginate(1);
        }
        else{
            $factsandfigures = File::where('file_category', 'FactsandFigures')->where('file_year', $year)
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
            $presentations = File::where('file_category', 'Presentation')
                             ->get(['id','file_title','file_year','file_name','file_category'])->paginate(1);
        }
        else{
            $presentations = File::where('file_category', 'Presentation')->where('file_year', $year)
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
        $id = base64_decode(str_pad(strtr($id, '-_', '+/'), strlen($id) % 4, '='));
        $year = base64_decode(str_pad(strtr($year, '-_', '+/'), strlen($year) % 4, '='));
        $puf_request = DB::table('nns_'.$year.'.puf_items')->where('id', $id)->first();
        $component = $puf_request->item_survey.'_'.$puf_request->item_year;
        
        $variable = DB::table('variable_label_'.$year)->where('formno', $component)->get();
        return view('puf_request', compact('variable', 'puf_request'))->with(['title' => 'PUF-Request']);
    }


}
