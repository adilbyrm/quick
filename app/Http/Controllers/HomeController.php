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
    	$products = DB::table('StockCards AS S')
					->select('S.ID AS stockID', 'S.Name AS stockName', 'T.Name AS trademarkName', 'SP.Price')
                    ->leftJoin('StockCardSellPrices AS SP', 'S.ID', '=', 'SP.StockID')
    				->leftJoin('Trademarks AS T', 'T.ID', '=', 'S.TrademarkID')
    				->limit(12)->get();
    	$productHtml = view('front.layouts.partials.singleProduct')->with('products', $products);
    	return view('front.home.index')->with('productHtml', $productHtml);
    }
}
