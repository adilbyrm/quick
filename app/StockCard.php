<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StockCardSellPrice;

class StockCard extends Model
{
    protected $table = 'StockCards AS SC';

    /**
     * 
     */
    public static function getStockCards($limit = 12)
    {
    	$stocks = static::select('SC.ID AS stockID', 'SC.Name AS stockName', 'SC.SellPriceID AS defaultSellPriceID', 'SC.Picture AS stockMainPicture', 'T.Name AS trademarkName')
					->leftJoin('Trademarks AS T', 'T.ID', '=', 'SC.TrademarkID')
					->limit($limit)->get();

        $arr = [];

        $stockCardSellPrice = new StockCardSellPrice;

        foreach($stocks as $stock) {
            $x = $stockCardSellPrice->getSellPrice($stock->stockID, $stock->defaultSellPriceID);

            $stock['price'] = $x->sellPrice();

            $stock['currencyCode'] = $x->currencyCode();

            $arr[] = $stock;
        }
        return $arr;
    }

    /**
     * 
     */
    public static function getStockCard($stockID)
    {
    	$stock = static::select('SC.ID AS stockID', 'SC.Name AS stockName', 'SC.SellPriceID AS defaultSellPriceID', 'SC.Explanation', 'SC.Picture AS stockMainPicture', 'T.Name AS trademarkName')
					->leftJoin('Trademarks AS T', 'T.ID', '=', 'SC.TrademarkID')
					->where('SC.ID', $stockID)
					->first();

        if (! $stock)
            return false;

        $stockCardSellPrice = new StockCardSellPrice;

        $stock['price'] = $stockCardSellPrice->getSellPrice($stockID, $stock->defaultSellPriceID)->sellPrice();

    	$stock['currencyCode'] = $stockCardSellPrice->getSellPrice($stockID, $stock->defaultSellPriceID)->currencyCode();

    	return $stock;
    }
}
