<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

use Log;

class Cart extends Model
{

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'Carts';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];
    
    public function sessionID()
    {
        return session()->getId();
    }

    public function accountID()
    {
        if( auth()->guard('user')->check() ) {
            return auth()->guard('user')->user()->ID;
        }
        return 0;
    }

    public function employeeID()
    {
        // if( auth()->guard('employee')->check() ) {
        //     return auth()->guard('employee')->user()->ID;
        // }
        return 0;
    }

    public function carts()
    {
        return Cart::where('AccountID', $this->accountID())->where('orderID', 0);
    }

    /**
     * AJAX - CartController
     */
    public function getAllCarts()
    {
        return $this->carts()
                    ->select('Carts.RowID AS cartID', 'Carts.ProductID', 'Carts.ProductCount', 'StockCards.Name', 'StockCardSellPrices.Price')
                    ->leftJoin('StockCards', 'Carts.productID', '=', 'StockCards.ID')
                    ->leftJoin('StockCardSellPrices', 'Carts.ProductID', '=', 'StockCardSellPrices.StockID')
                    ->whereRaw('StockCardSellPrices.ID = StockCards.SellPriceID')
                    ->get();
    }

    /**
     * AJAX - CartController
     */
    public function addToCart($productID)
    {
    	$cart = $this->carts()->where('ProductID', $productID)->first();
        if($cart) {
            $cart->ProductCount += 1;
            $cart->SessionID = $this->sessionID();
            if($cart->save()) {
                Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; 1 adet artırıldı.');
                return true;
            }
            Log::error('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; 1 adet artırma işlemi gerçekleşmedi.');
            return false;
        } else {
            $ID = 1;
            $lastInsert = DB::table('Carts')->select('RowID')->orderBy('RowID', 'DESC')->first();
            if($lastInsert) {
                $ID = $lastInsert->RowID + 1;
            }
            $create = Cart::create([
                'ProductID' => $productID,
                'AccountID' => $this->accountID(),
                'EmployeeID' => $this->employeeID(),
                'ProductCount' => 1,
                'SessionID' => $this->sessionID(),
                'RowEditUserNo' => $this->accountID(),
                'RowAddUserNo' => $this->accountID(),
                'ProductSellPrice' => 0.00,
                'OrderID' => 0,
                'ID' => $ID
            ]);
            if($create) {
                Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $create->RowID .', ProductID: '. $productID .'; yeni Cart oluşturuldu.');
                return true;
            }
            Log::error('AccountID: '. $this->accountID() .', ProductID: '. $productID .'; yeni Cart oluşturulurken hata oluştu.');
            return false;
        }
        return false;
    }

    public function updateCart()
    {
    	
    }

    /**
     * AJAX - CartController
     */
    public function deleteCart($cartID)
    {
    	if ( $this->carts()->where('RowID', $cartID)->delete() ) {
            Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $cartID .'; cart silindi.');
            return true;
        }
        Log::error('AccountID: '. $this->accountID() .', Cart.RowID: '. $cartID .'; cart silinemedi.');
        return false;
    }

    public function trancateCart()
    {
    	
    }

    public function totalCart()
    {
        $total = 0;
        foreach($this->getAllCarts() as $cart) {
            $total += $cart->Price * $cart->ProductCount;
        }
        return $total;
    }
}
