<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\FrontController;

class SalesController extends FrontController
{
    public function salesDisplay()
    {
    	return view('front.sales.salesDisplay');
    }
}
