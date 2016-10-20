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

    	$products = DB::table('StockCards as S')
					->select('S.RowID as stockID', 'S.Name AS stockName', 'T.Name AS trademarkName')
    				->leftJoin('Trademarks as T', 'T.RowID', '=', 'S.TrademarkID')
    				->limit(12)->get();
    	$productHtml = view('front.layouts.partials.singleProduct')->with('products', $products);
    	return view('front.home.index')->with('productHtml', $productHtml);
    }
}
