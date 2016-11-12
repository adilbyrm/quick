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
    	$products = \App\StockCard::getStockCards();

    	$productHtml = view('front.layouts.partials.singleProduct')->with('products', $products);

    	return view('front.home.index')->with('productHtml', $productHtml);
    }

    // public function image($id)
    // {
    //     $value = DB::table('StockGroups')->where('ID', $id)->first();
    //     return response()->view('front.image', ['value' => $value])->header('Content-Type', 'image/jpeg');
    // }
}
