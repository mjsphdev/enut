<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $countries = DB::table('countries')->get();
        return view('auth.myaccount', compact('countries', 'user'));
    }

    public function updateAccount(Request $request)
    {
        $user = User::find($request->id);
        $user->update([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' =>$request->lastname,
            'gender' => $request->gender,
            'country' => $request->country,
            'affiliation' => $request->affiliation,
            'office_address' => $request->address,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('message', 'Updated Successfully');
    }
}
