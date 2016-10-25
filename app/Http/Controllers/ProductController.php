<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
    	return $productName . ' : ' . $productID ;
    }
}
