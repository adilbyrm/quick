<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $fillable = [];

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'CurrentAccounts';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'RememberToken',
    ];

    public function getRememberTokenName()
    {
        return 'RememberToken';
    }

    protected $defaultBalanceCurrencyNo;

    protected $balanceCurrencyCode;

    protected $balanceCurrencyName;

    protected $balanceCurrencyPrice;

    public function defaultBalanceCurrencyNo()
    {
        $defaultCurrencyNo = auth()->guard('user')->user()->DefaultBalanceCurrencyNo;
        if ($defaultCurrencyNo === 0) {
            $defaultCurrencyNo = 1;
        }
        return $this->defaultBalanceCurrencyNo = $defaultCurrencyNo;
    }

    public function balanceCurrencyCode()
    {
        return $this->balanceCurrencyCode = Currency::getCurrencyCode($this->defaultBalanceCurrencyNo())->CurrencyCode;
    }

    public function balanceCurrencyPrice()
    {
        $this->balanceCurrencyPrice = CurrencyPrice::getCurrencyPrices($this->defaultBalanceCurrencyNo())->BuyPrice;
        return $this->balanceCurrencyPrice > 0 ? $this->balanceCurrencyPrice : 1 ;
    }

    public function balanceCurrencyName()
    {
        return $this->balanceCurrencyName = Currency::getCurrencyCode($this->defaultBalanceCurrencyNo())->CurrencyName;
    }

}
