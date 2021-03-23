<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

class SendPuf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendPuf:sendpuf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dataset Sent Succesfully';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
