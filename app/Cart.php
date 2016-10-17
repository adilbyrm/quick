<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'Carts';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    public static function getCart()
    {

    }

    public static function addToCart()
    {
    	
    }

    public static function updateCart()
    {
    	
    }

    public static function deleteCart()
    {
    	
    }

    public static function trancateCart()
    {
    	
    }
}
