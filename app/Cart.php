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

    protected $accountID;
    
    public function sessionID()
    {
        return session()->getId();
    }

    public function accountID()
    {
        return $this->accountID = auth()->guard('user')->user()->RowID;
    }

    public function salesmanID()
    {

    }

    public function getCart()
    {
        
    }

    public function addToCart($productID)
    {
    	// Cart::where([])
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
