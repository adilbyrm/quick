<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
use Auth;
use App\User;

class DealerController extends FrontController
{
	public function __construct()
	{
        parent::__construct();
		$this->middleware('XSSProtection');
		$this->middleware('guest', ['except' => 'logout']);
	}

    public function login()
    {
    	return view('front.dealer.dealer_login');
    }

    public function loginP(Request $request)
    {
    	$user = User::where('username', $request->log_email)->where('password', $request->log_password)->first();
    	if($user) {
    		Auth::guard('user')->loginUsingId($user->RowID, true); 
    		return redirect()->intended(session()->get('_previous.url'));
    	}
    	return redirect()->route('dealer.login')->with('failure', 'Giriş işleminiz gerçekleşmedi');
    }

    public function logout()
    {
    	auth()->guard('user')->logout();
    	return back();
    }
}
