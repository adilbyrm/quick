<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\FrontController;
use Session;
use App\Receipt;
use App\ReceiptStock;

class ReceiptController extends FrontController
{
    public function __construct()
	{
		parent::__construct();

		$this->middleware('XSSProtection');

		$this->middleware('auth');
	}

	public function createSellReceipt()
	{
		$receipt = new Receipt;

		$rowID = $receipt->RowID();

		$receipts = $receipt->createSellReceipt();

		$receiptStocks = (new ReceiptStock(new Receipt))->createSellReceiptStocks();

		$name = Date('YmdHis') . uniqid();

		$file = @fopen( base_path("sell_receipts/SellReceipt_{$name}.xml"), "x");

		if ($file !== false) {
			$xml = '<?xml version="1.0"?>' .
					'<SellOrders>' .
						$receipts .
						$receiptStocks .
					'</SellOrders>';

			fwrite($file, $xml);
			fclose($file);
			
			\Cart::carts()->update(['orderID' => $rowID]);

			return redirect()->route('homepage')->with('success', 'Siparişiniz başarıyla oluşturulmuştur.');
		}

		return back()->with('failure', 'Siparişiniz oluşturken sorun oluştu.');
	}
}
