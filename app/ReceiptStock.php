<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptStock extends Model
{
    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'ReceiptStocks';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    protected $receipt;

    protected $cart;

    public function __construct(Receipt $receipt)
    {
    	$this->receipt = $receipt;
    }

    public function cart($cartID)
    {
    	$this->cart = \Cart::getSingleCart($cartID);
    }

	public function RowID($i)
	{
		$lastRow = \DB::table($this->table)->select('RowID')->orderBy('RowID', 'DESC')->first();
		return $lastRow ? $lastRow->RowID + $i : $i;
	}
	
	public function RowAddDateTime()
	{
		return $this->receipt->RowAddDateTime();
	}

	public function RowAddUserNo()
	{
		return $this->receipt->RowAddUserNo();
	}

	public function RowEditDateTime()
	{
		return $this->receipt->RowEditDateTime();
	}

	public function RowEditUserNo()
	{
		return $this->receipt->RowEditUserNo();
	}

	public function ReceiptDirection()
	{
		return $this->receipt->ReceiptDirection();
	}

	public function ReceiptType()
	{
		return $this->receipt->ReceiptType();
	}
	
	public function ReceiptID()
	{
		return $this->receipt->ID();
	}
	
	public function Time()
	{
		return $this->receipt->Time();
	}
	
	public function AccountID()
	{
		return $this->receipt->AccountID();
	}
	
	public function ReceiptCurrencyNo()
	{
		return $this->receipt->BalanceCurrencyNo();
	}
	
	public function ReceiptCurrencyPrice()
	{
		return $this->receipt->BalanceCurrencyPrice();
	}
	
	public function ID($i)
	{
		return $this->RowID($i);
	}
	
	public function StockID()
	{
		return $this->cart->ProductID;
	}
	
	public function StockCode()
	{
		return $this->cart->stockCode;
	}
	
	public function StockName()
	{
		return $this->cart->stockName;
	}
	
	public function Number()
	{
		return null;
	}
	
	public function UnitName()
	{
		return 'Adet';
	}
	
	public function Amount()
	{
		return $this->cart->ProductCount;
	}
	
	public function Price()
	{
		return $this->cart->price;
	}
	
	public function CurrencyNo()
	{
		return $this->cart->currencyNo;
	}
	
	public function CurrencyCode()
	{
		return $this->cart->currencyCode;
	}
	
	public function CurrencyPrice()
	{
		return $this->cart->currencyPrice;
	}
	
	public function Discount()
	{
		return 0;
	}
	
	public function DiscountedPrice()
	{
		return $this->Price();
	}
	
	public function DiscountRatio()
	{
		return 0;
	}
	
	public function DiscountRatio2()
	{
		return 0;
	}
	
	public function DiscountRatio3()
	{
		return 0;
	}
	
	public function TotalDiscount()
	{
		return 0;
	}
	
	public function VAT()
	{
		return $this->cart->stockVat;
	}
	
	public function VATStatus()
	{
		return 0;
	}
	
	public function VATPrice()
	{
		return $this->Price() - VAT($this->Price(), $this->VAT());
	}
	
	public function TotalVATPrice()
	{
		return $this->VATPrice() * $this->Amount();
	}
	
	public function WithoutVATPrice()
	{
		return VAT($this->Price(), $this->VAT());
	}
	
	public function TotalWithoutVATPrice()
	{
		return $this->WithoutVATPrice() * $this->Amount();
	}
	
	public function NetPrice()
	{
		return $this->Price();
	}
	
	public function NetTotalPrice()
	{
		return $this->Price() * $this->Amount();
	}
	
	public function CurrencyTotalWithoutVATPrice()
	{
		return ($this->TotalWithoutVATPrice() * $this->CurrencyPrice()) / $this->ReceiptCurrencyPrice();
	}
	
	public function CurrencyTotalDiscount()
	{
		return 0;
	}
	
	public function CurrencyTotalVATPrice()
	{
		return ($this->TotalVATPrice() * $this->CurrencyPrice()) / $this->ReceiptCurrencyPrice();
	}
	
	public function DepotID()
	{
		return $this->receipt->DepotID();
	}
	
	public function DepotName()
	{
		return $this->receipt->DepotName();
	}
	
	public function DepotAmount()
	{
		return 0;
	}
	
	public function EmployeeID()
	{
		return $this->receipt->EmployeeID();
	}
	
	public function EmployeeName()
	{
		return $this->receipt->EmployeeName();
	}

	public function Explanation()
	{
		return $this->receipt->Explanation();
	}

    public function createSellReceiptStocks()
    {
    	$class = new \ReflectionClass(self::class);
    	$methods = [];
    	foreach($class->getMethods() as $m) {
    		if ($m->class == self::class && $m->name != 'createSellReceiptStocks' && $m->name != '__construct' && $m->name != 'cart') {
    			$methods[] = $m->name;
    		}
    	}

    	$carts = \Cart::getAllCarts();

    	$receiptStocks = '';
    	$i = 1;
    	foreach($carts as $cart) {

    		$this->cart($cart->cartID);

    		$receiptStocks .= "<ReceiptStocks>";
    			foreach($methods as $method) {
    				$receiptStocks .= "<{$method}>" . $this->$method($i) . "</{$method}>";
    			}
    		$receiptStocks .= "</ReceiptStocks>";
    		$i++;
    	}

    	return $receiptStocks;
    }

}