<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use DB;

class FrontController extends Controller
{
    public function __construct()
    {
    	$trademarks = DB::table('Trademarks')->limit(5)->get();
    	$productGroups = DB::table('StockGroups')->get();

    	view()->share([
    			'trademarks' => $trademarks,
    			'productGroups' => $productGroups
			]);
    }
}
