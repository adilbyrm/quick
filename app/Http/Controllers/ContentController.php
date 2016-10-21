<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function about()
    {
    	return 'about';
    }

    public function contact()
    {
    	return 'contact';
    }
}
