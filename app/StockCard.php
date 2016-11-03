<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockCard extends Model
{
    protected $table = 'StockCards AS SC';

    public static function getStockCards($limit = 12)
    {
    	return static::select('SC.ID AS stockID', 'SC.Name AS stockName', 'SC.SellPriceID AS defaultSellPriceID', 'SC.Picture AS stockMainPicture', 'T.Name AS trademarkName')
					->leftJoin('Trademarks AS T', 'T.ID', '=', 'SC.TrademarkID')
					->limit($limit)->get();
    }

    public static function getStockCard($stockID)
    {
    	return static::select('SC.ID AS stockID', 'SC.Name AS stockName', 'SC.SellPriceID AS defaultSellPriceID', 'SC.Explanation', 'SC.Picture AS stockMainPicture', 'T.Name AS trademarkName')
					->leftJoin('Trademarks AS T', 'T.ID', '=', 'SC.TrademarkID')
					->where('SC.ID', $stockID)
					->first();
    }
}
