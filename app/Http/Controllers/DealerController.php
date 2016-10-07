<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use DB;

class DealerController extends FrontController
{
	public function __construct()
	{
		$this->middleware('XSSProtection');
	}

    public function login()
    {
    	return view('front.dealer.dealer_login');
    }

    public function loginP(Request $request)
    {
    	dd(DB::table('Accounts')->where('password', '246810')->get());
    }
}
