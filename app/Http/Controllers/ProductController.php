<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\StockCard;

class ProductController extends FrontController
{
	public function productsOfTrademark($trademarkID)
    {
    	return 'proOfTrademark: '. $trademarkID;
    }

    public function productsOfCategory($categoryID)
    {
    	return 'proOfCategory: '. $categoryID;
    }

    public function productDetail($productName, $productID)
    {
        $stockCard = StockCard::getStockCard($productID);
        if (! $stockCard) {
            return redirect()->route('homepage');
        }
    	return view('front.product.productDetail')->with('stockCard', $stockCard);
    }
}
