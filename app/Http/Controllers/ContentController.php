<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContentController extends FrontController
{

    public function about()
    {
    	return view('front.contents.about');
    }

    public function contact()
    {
    	return view('front.contents.contact');
    }
}
