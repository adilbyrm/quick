<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\FrontController;
use Session;

use Cart; // facade class

class CartController extends FrontController
{
	public function __construct()
	{
		parent::__construct();
		$this->middleware('XSSProtection');
		$this->middleware('auth');
	}

	/**
	 * AJAX Request from main.blade (homepage)
	 */
    public function addToCart(Request $request)
    {
    	if ( Cart::addToCart($request->input('prodcutID')) ) {
    		return ['type' => 'success', 'message' => 'Ürün sepetinize eklenmiştir.'];
    	}
    	return ['type' => 'error', 'message' => 'Ürün sepetinize eklenirken bir hata oluştu'];
    }

    /**
     * AJAX Request from main.blade
     */
    public function getTopMenuBox()
    {
    	$carts = Cart::getAllCarts();
    	$html = view('front.layouts.partials.topBox')->with('carts', $carts);
    	return $html;
    }
}
