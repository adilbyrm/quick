<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class HomeController extends FrontController
{
    public function homepage()
    {
    	// return session::all();
    	return view('front.home.index');
    }
}
