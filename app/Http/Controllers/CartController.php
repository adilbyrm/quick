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

    public function addToCart($stockID)
    {
    	return $stockID;
    }
}
