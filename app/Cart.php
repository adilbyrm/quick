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
    
    /**
     * 
     */
    public function sessionID()
    {
        return session()->getId();
    }

    /**
     * 
     */
    public function accountID()
    {
        if ( auth()->guard('user')->check() ) {
            return auth()->guard('user')->user()->ID;
        }

        return 0;
    }

    /**
     * 
     */
    public function employeeID()
    {
        // if ( auth()->guard('employee')->check() ) {
        //     return auth()->guard('employee')->user()->ID;
        // }
        return 0;
    }

    /**
     * 
     */
    public function carts()
    {
        return Cart::where('AccountID', $this->accountID())->where('orderID', 0);
    }

    /**
     * AJAX - CartController
     */
    public function getAllCarts()
    {
        $carts = $this->carts()
                    ->select(
                        'Carts.RowID AS cartID',
                        'Carts.ProductID',
                        'Carts.ProductCount',
                        'StockCards.SellPriceID AS defaultSellPriceID',
                        'StockCards.Name AS stockName',
                        'StockCards.VAT AS stockVat',
                        'StockCards.Picture AS stockMainPicture'
                    )
                    ->leftJoin('StockCards', 'Carts.productID', '=', 'StockCards.ID')
                    ->get();
        $arr = [];

        $stockCardSellPrice = new StockCardSellPrice;

        foreach($carts as $cart) {
            $x = $stockCardSellPrice->getSellPrice($cart->ProductID, $cart->defaultSellPriceID);

            $cart['price'] = $x->sellPrice();

            $cart['currencyCode'] = $x->currencyCode();

            $cart['currencyPrice'] = $x->currencyPrice();

            $arr[] = $cart;
        }
        return $arr;
    }

    public function getSingleCart($cartID)
    {
        $cart = $this->carts()
                    ->select(
                        'Carts.RowID AS cartID',
                        'Carts.ProductID',
                        'Carts.ProductCount',
                        'StockCards.SellPriceID AS defaultSellPriceID',
                        'StockCards.Name AS stockName',
                        'StockCards.Code AS stockCode',
                        'StockCards.VAT AS stockVat'
                    )
                    ->leftJoin('StockCards', 'Carts.productID', '=', 'StockCards.ID')
                    ->where('Carts.RowID', $cartID)
                    ->first();

        $stockCardSellPrice = new StockCardSellPrice;

        $x = $stockCardSellPrice->getSellPrice($cart->ProductID, $cart->defaultSellPriceID);

        $cart['price'] = $x->sellPrice();

        $cart['currencyNo'] = $x->currencyNo();

        $cart['currencyCode'] = $x->currencyCode();

        $cart['currencyPrice'] = $x->currencyPrice();

        return $cart;
    }

    /**
     * AJAX - CartController
     */
    public function addToCart($productID, $quantity)
    {
    	$cart = $this->carts()->where('ProductID', $productID)->first();
        if ($cart) {
            $cart->ProductCount += $quantity;
            $cart->SessionID = $this->sessionID();

            if ($cart->save()) {
                Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; '. $quantity .' adet artırıldı.');
                return true;
            }

            Log::error('AccountID: '. $this->accountID() .', Cart.RowID: '. $cart->RowID .', ProductID: '. $productID .'; '. $quantity .' adet artırma işlemi gerçekleşmedi.');
            return false;
        } else {
            $ID = 1;
            $lastInsert = DB::table('Carts')->select('RowID')->orderBy('RowID', 'DESC')->first();

            if ($lastInsert) {
                $ID = $lastInsert->RowID + 1;
            }

            $create = Cart::create([
                'ProductID' => $productID,
                'AccountID' => $this->accountID(),
                'EmployeeID' => $this->employeeID(),
                'ProductCount' => $quantity,
                'SessionID' => $this->sessionID(),
                'RowEditUserNo' => $this->accountID(),
                'RowAddUserNo' => $this->accountID(),
                'ProductSellPrice' => 0.00,
                'OrderID' => 0,
                'ID' => $ID
            ]);

            if ($create) {
                Log::info('AccountID: '. $this->accountID() .', Cart.RowID: '. $create->RowID .', ProductID: '. $productID .'; '. $quantity .' adet Cart oluşturuldu.');
                return true;
            }

            Log::error('AccountID: '. $this->accountID() .', ProductID: '. $productID .'; '. $quantity .' adet Cart oluşturulurken hata oluştu.');
            return false;
        }
        return false;
    }

    /**
     * 
     */
    public function updateCart($carts)
    {
    	foreach($carts as $cart) {
            $this->carts()->where('RowID', $cart['id'])->update(['ProductCount' => $cart['quantity']]);
        }
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

    /**
     * 
     */
    public function trancateCart()
    {
    	
    }

    /**
     * 
     */
    public function totalCart()
    {
        $total = 0;
        $totalWithoutVat = 0; 
        $balanceCurrencyPrice = (new \App\User)->balanceCurrencyPrice();

        foreach($this->getAllCarts() as $cart) {
            $price = ($cart->price * $cart->currencyPrice) / $balanceCurrencyPrice; // urune ait dovizden kullaniciya ait dovize cevir.
            $total += $price * $cart->ProductCount;
            $totalWithoutVat += VAT($price, $cart->stockVat) * $cart->ProductCount;
        }

        return ['total' => $total, 'totalWithoutVat' => $totalWithoutVat];
    }

    public function totalAmount()
    {
        $amount = 0;
        foreach($this->getAllCarts() as $cart) {
            $amount += $cart->ProductCount;
        }
        return $amount;
    }
}
