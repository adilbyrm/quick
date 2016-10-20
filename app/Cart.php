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
        return auth()->guard('user')->user()->RowID;
    }

    public function personalID()
    {

    }

    public function carts()
    {
        return Cart::where('AccountID', $this->accountID())->where('orderID', 0);
    }

    public function getAllCarts()
    {
        return $this->carts()
                    ->leftJoin('StockCards', 'Carts.productID', '=', 'StockCards.RowID')
                    ->get();
    }

    public function addToCart($productID)
    {
    	$cart = $this->carts()->where('ProductID', $productID)->first();
        if($cart) {
            $cart->ProductCount += 1;
            if($cart->save()) {
                Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; 1 adet artırıldı.');
                return true;
            }
            Log::error('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; 1 adet artırma işlemi gerçekleşmedi.');
            return false;
        } else {
            $guid = getGUID();
            $create = Cart::create([
                'ProductID' => $productID,
                'AccountID' => $this->accountID(),
                'ProductCount' => 1,
                'SessionID' => $guid,
                'RowEditUserNo' => $this->accountID(),
                'RowAddUserNo' => $this->accountID(),
                'ProductSellPrice' => 0.00,
                'OrderID' => 0
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

    public function deleteCart()
    {
    	
    }

    public function trancateCart()
    {
    	
    }
}
