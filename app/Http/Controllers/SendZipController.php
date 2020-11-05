<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRequested;
use DB;
use Excel;
use Zipper;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use Storage;
use Auth;
use File;

class SendZipController extends Controller
{
    public function sendEmail()
    {   
           $send = UserRequested::where('status', 1)->get();
           foreach($send as $sent){

            //send_zip_file
            $datas = storage_path('Zip'.'/'.$sent->zip_file);
            $feedback = storage_path('Feedback/Feedback_form.pdf');
            $files = [$datas,$feedback];
            $dt = $sent->date;
            $email = $sent->email;
            $name = $sent->name;
            $name = str_replace('-',' ',$name);

            //send_update
            UserRequested::find($sent->id)->update(['status' => 0]);

            Mail::send('contact.sendattachment', array(
                'name' => $name
            ),
            function($message) use ($files, $dt, $email)
            {    
             $message->from('enutrition.fnri.gov@gmail.com');
             $message->to($email)->subject('NNS Data '.$dt);
             foreach($files as $file){
             $message->attach($file);
             }
            });
            
            unlink(storage_path('Zip'.'/'.$sent->zip_file));
            $name = $sent->name;
            $name = str_replace(' ','-',$name);
            $csvfile = $name.'-'.$dt;
            $folderPath = storage_path('Csv'.'/'.$csvfile);
            File::deleteDirectory($folderPath);
    
           }
   
    }
}
