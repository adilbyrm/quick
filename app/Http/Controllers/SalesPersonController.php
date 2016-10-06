<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class SalesPersonController extends FrontController
{
    public function login()
    {
    	return session::all();
    	return view('front.dealer.salesperson_login');
    }
}
