<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockCardSellPrice extends Model
{

	protected $table = 'StockCardSellPrices';

    public static function getSellPrice($stockCardID, $defaultSellPriceID = 1)
    {
    	$sellPrices = static::select('Price')->where('StockID', $stockCardID);

		if( auth()->check() ) {
			if( $sellPrices->count() >= auth()->guard('user')->user()->SellPriceIndex ) { // cari hesaba verilen default stocksellprice index'i stock satis fiyatlarinin icinde varsa (hesaba 3 indexi ayarlanir ve urunde 3 fiyat yoksa)
			    $sellPrices->where("ID", auth()->guard('user')->user()->SellPriceIndex);
			} else {
				$sellPrices->where('ID', $defaultSellPriceID);
			}
		} else {
		    $sellPrices->where('ID', $defaultSellPriceID);
		}

		$sellPrices = $sellPrices->first();
		
		return $sellPrices->Price;
    }
}
