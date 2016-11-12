<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyPrice extends Model
{
    protected $connection = 'DBProjectDesignerUser';

    protected $table = 'CurrencyPrices';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    public static function getCurrencyPrices($currencyNo)
    {
        return self::where('CurrencyNo', $currencyNo)->orderBy('PriceDateTime', 'DESC')->first();
    }
}
