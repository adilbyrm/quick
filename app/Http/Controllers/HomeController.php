<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use DB;

class HomeController extends FrontController
{
	public function __construct()
	{
		parent::__construct();
	}

    public function homepage()
    {
    	$products = DB::table('StockCards')->limit(12)->get();
    	$productHtml = view('front.layouts.partials.singleProduct')->with('products', $products);
    	return view('front.home.index')->with('productHtml', $productHtml);
    }
}
