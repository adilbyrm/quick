<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use DB;

use Auth;

class DealerController extends FrontController
{
	public function __construct()
	{
		$this->middleware('XSSProtection');
		// $this->middleware('guest');
	}

    public function login()
    {
    	return view('front.dealer.dealer_login');
    }

    public function loginP(Request $request)
    {
    	$user = DB::table('Accounts')->where('username', $request->log_email)->where('password', $request->log_password)->first();
    	if($user) {
    		Auth::guard('user')->loginUsingId($user->RowID);
    		return back();
    	}
    	return redirect()->route('dealer.login');
    }
}
