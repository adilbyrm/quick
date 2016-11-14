<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'Receipts';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

	public function RowID()
	{
		$lastRow = self::select('RowID')->orderBy('RowID', 'DESC')->first();
		return $lastRow ? $lastRow->RowID + 1 : 1;
	}

	public function RowAddDateTime()
	{
		return Date('Y-m-d H:i:s.uP');
	}

	public function RowAddUserNo()
	{
		return 1;
	}

	public function RowEditDateTime()
	{
		return Date('Y-m-d H:i:s.uP');
	}

	public function RowEditUserNo()
	{
		return 0;
	}

	public function ReceiptDirection()
	{
		return 1;
	}

	public function ReceiptType()
	{
		return 1;
	}

	public function ID()
	{
		return 1;
	}

	public function ReceiptNo()
	{
		return '0000000001';
	}

	public function Time()
	{
		return Date('Y-m-d H:i:s.uP');
	}

	public function DepotID()
	{
		return 1;
	}

	public function DepotName()
	{
		return 'merkez';
	}

	public function EmployeeID()
	{
		return auth()->guard('user')->user()->SellerID;
	}

	public function EmployeeName()
	{
		$identity = (new Identity)->getIdentity($this->EmployeeID());
		return $identity->Name . ' ' . $identity->Surname;
	}

    public function AccountID()
    {
    	return auth()->guard('user')->user()->ID;
    }

    public function AccountCode()
    {
    	return auth()->guard('user')->user()->Code;
    }

    public function AccountName()
    {
    	$identity = (new Identity)->getIdentity($this->AccountID());
		return $identity->Name . ' ' . $identity->Surname;
    }

    public function BalanceCurrencyNo()
    {
    	return (new User)->defaultBalanceCurrencyNo();
    }

    public function BalanceCurrencyCode()
    {
    	return (new User)->balanceCurrencyCode();
    }

    public function BalanceCurrencyPrice()
    {
    	return (new User)->balanceCurrencyPrice();
    }

    public function Remainder()
    {
    	return 0;
    }

    public function CurrencyNo()
    {
    	return (new User)->defaultBalanceCurrencyNo();
    }

    public function CurrencyCode()
    {
    	return (new User)->balanceCurrencyCode();
    }

    public function CurrencyPrice()
    {
    	return (new User)->balanceCurrencyPrice();
    }

    public function TotalAmount()
    {
    	return \Cart::totalAmount();
    }

    public function TotalPrice()
    {
    	return \Cart::totalCart()['totalWithoutVat'];
    }

    public function TotalDiscount()
    {
    	return 0;
    }

    public function TotalDiscountedPrice()
    {
    	return $this->TotalPrice() - $this->TotalDiscount();
    }

    public function TotalVATPrice()
    {
    	return \Cart::totalCart()['total'] - $this->TotalPrice();
    }

    public function NetTotalPrice()
    {
    	return \Cart::totalCart()['total'];
    }

    public function AccountNetTotalPrice()
    {
    	return \Cart::totalCart()['total'];
    }

    public function AccountingAccountNetTotalPrice()
    {
    	return 0;
    }

    public function Status()
    {
    	return 0;
    }

    public function Explanation()
    {
    	return null;
    }

    public function AccountingAccountID()
    {
    	return 0;
    }

    public function VatAccountingAccountID()
    {
    	return 0;
    }

    public function AccountAccountingAccountID()
    {
    	return 0;
    }

    public function AccountBuyersAccountID()
    {
    	return 0;
    }

    public function AccountSellersAccountID()
    {
    	return 0;
    }

    public function BuyersAccountID()
    {
    	return 0;
    }

    public function SellersAccountID()
    {
    	return 0;
    }

    public function BuysAccountID()
    {
    	return 0;
    }

    public function SellsAccountID()
    {
    	return 0;
    }

    public function BuysVatAccountID()
    {
    	return 0;
    }

    public function SellsVatAccountID()
    {
    	return 0;
    }

    public function SettingID()
    {
    	return 1;
    }

    public function createSellReceipt()
    {
    	// $classMethods = get_class_methods(self::class);
    	$class = new \ReflectionClass(self::class);
    	$methods = [];
    	foreach($class->getMethods() as $m) {
    		if ($m->class == self::class && $m->name != 'createSellReceipt') {
    			$methods[] = $m->name;
    		}
    	}

    	$receipts = "<Receipts>";
    		foreach($methods as $method) {
    			$receipts .= "<{$method}>" . $this->$method() . "</{$method}>";
    		}
    	$receipts .= "</Receipts>";

    	return $receipts;
    }
}
