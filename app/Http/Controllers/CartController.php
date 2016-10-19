<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\FrontController;

use Session;

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
    	return \Cart::addToCart($request->input('prodcutID'));
    	// return ['type' => 'success', 'message' => 'added product (AJAX): ' . $request->input('prodcutIDprodcutID')];
    	// return ['type' => 'error', 'message' => 'didn\'t add product (AJAX): ' . $request->input('prodcutID')];
    }

    public function getTopMenuBox()
    {

    }
}
