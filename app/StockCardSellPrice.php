<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockCardSellPrice extends Model
{

	protected $table = 'StockCardSellPrices';

	protected $sellPrices;

	protected $sellPrice;

	protected $currencyCode;

	protected $currencyName;

	protected $currencyPrice;

	/**
	 * $stockCardID = $stockCard->ID
	 * $defaultSellPriceID = $stockCard->SellPriceID
	 * Her urunun 1den fazla fiyati var(StockCardSellPrices) ve her urunun default fiyati var($stockCard->SellPriceID)
	 * Her cari'ye atanmis urun fiyati var($account->SellPriceIndex) (StockCardSellPrices->ID = $account->SellPriceIndex)
	 * eger cari'ye atanmis fiyat alani fiyatlar tablosunda bulunamazsa urune atanan default fiyat return edilir.
	 */
    public function getSellPrice($stockCardID, $defaultSellPriceID = 1)
    {
    	$sellPrices = self::select('Price', 'CurrencyNo')->where('StockID', $stockCardID);

		if ( auth()->check() ) {
			if ( $sellPrices->count() >= auth()->guard('user')->user()->SellPriceIndex ) { // cari hesaba verilen default stocksellprice index'i stock satis fiyatlarinin icinde varsa (hesaba 3 indexi ayarlanir ve urunde 3 fiyat yoksa)
			    $sellPrices->where("ID", auth()->guard('user')->user()->SellPriceIndex);
			} else {
				$sellPrices->where('ID', $defaultSellPriceID);
			}
		} else {
		    $sellPrices->where('ID', $defaultSellPriceID);
		}

		$this->sellPrices = $sellPrices->first();
    
		return $this;
    }

    /**
     * urunun satis fiyati
     */
    public function sellPrice()
    {
    	return $this->sellPrice = $this->sellPrices->Price;
    }

    public function currencyNo()
    {
        return $this->sellPrice = $this->sellPrices->CurrencyNo;
    }

    /**
     * urunun doviz kodu(TL,USD...)
     */
    public function currencyCode()
    {
    	return $this->currencyCode = Currency::getCurrencyCode($this->sellPrices->CurrencyNo)->CurrencyCode;
    }

    /**
     * urunun doviz kuru(kur fiyati)
     */
    public function currencyPrice()
    {
    	$this->currencyPrice = CurrencyPrice::getCurrencyPrices($this->sellPrices->CurrencyNo)->BuyPrice;
    	return $this->currencyPrice > 0 ? $this->currencyPrice : 1 ;
    }

    /**
     * urunun doviz adi(turk lirasi, dolar...)
     */
    public function currencyName()
    {
    	return $this->currencyName = Currency::getCurrencyCode($this->sellPrices->CurrencyNo)->CurrencyName;
    }



}
