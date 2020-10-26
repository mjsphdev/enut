<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Controller;
use Mail;
use Carbon\Carbon;

class SendEmailController extends Controller
{
    function index()
    {
     return view('contact');
    }

    function send(Request $request) 
    {
     
     $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
     
     // Saving message in database
     // ContactUs::create($request->all()); 
     
     Mail::send('contact.email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message) use ($request)
     {    
        $message->from($request['email']);
        $message->to('enutrition.fnri.gov@gmail.com', 'Admin')->subject($request['subject']);
     });
 
     Mail::send('contact.notification',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_message' => $request->get('message')
        ), function($message) use ($request)
     {    
        $message->from('enutrition.fnri.gov@gmail.com', 'ENUTRITION.FNRI');
        $message->to($request['email'])->subject('ENUTRITION');
     });
 
     return response()->json(['success' => 'Thanks for contacting us!']);
    }
}
