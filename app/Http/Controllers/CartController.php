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

		$this->middleware('auth', ['except' => ['getTopMenuBox']]);
	}

	/**
	 * AJAX Request from main.blade (homepage)
	 */
    public function addToCart(Request $request)
    {
        $quantity = 1;

        if ( abs( (int)$request->input('quantity') ) > 0 ) {
            $quantity = abs( (int)$request->input('quantity') );
        }

    	if ( Cart::addToCart($request->input('prodcutID'), $quantity) ) {
    		return ['type' => 'success', 'message' => 'Ürün sepetinize eklenmiştir.'];
    	}

    	return ['type' => 'error', 'message' => 'Ürün sepetinize eklenirken bir hata oluştu'];
    }

    /**
     * AJAX Request from main.blade
     */
    public function getTopMenuBox()
    {
    	$carts = [];

        $total = null;

    	if (auth()->check()) {
    		$carts = Cart::getAllCarts();

            $total = Cart::totalCart();
    	}

    	$html = view('front.layouts.partials.topBox')->with('carts', $carts)->with('total', $total);

    	return $html;
    }

    /**
     * 
     */
    public function deleteTheCart(Request $request)
    {
    	if ( Cart::deleteCart($request->input('cartID')) ) {
    		return '';
    	}

    	return 'does not deleted';
    }

    public function getCarts()
    {
        return view('front.cart.allCarts');
    }

    /**
     * AJAX - cart page FROM main.blade - allCarts.blade
     */
    public function getCartsXHR()
    {
        $carts = Cart::getAllCarts();

        $total = Cart::totalCart();

        $html = view('front.cart.allCartsXHR')->with('carts', $carts)->with('total', $total);

        return $html;
    }

    /**
     * AJAX - update cart from cart - allCartsXHR.blade
     */
    public function updateCartsXHR(Request $request)
    {
        foreach($request->input('carts') as $cart) {

            array_walk($cart, function(&$val, $key) {
                if ( abs( (int)$val ) > 0 ) {
                    $val = abs( (int)$val );
                } else {
                    $val = 1;
                }
            });

            $newCarts[] = $cart;
        }

        Cart::updateCart($newCarts);

        return ['type' => 'success', 'message' => 'Sepetiniz güncellenmiştir.'];
    }
}
