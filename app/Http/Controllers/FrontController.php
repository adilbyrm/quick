<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use DB;

use Cache;

class FrontController extends Controller
{
    public function __construct()
    {

    	Cache::remember('trademarks', 1, function() {
	    	return DB::table('Trademarks')->limit(5)->get();
    	});

    	Cache::remember('productGroups', 1, function() {
    		return DB::table('StockGroups')->get();
    	});

    	view()->share([
    			'trademarks' => Cache::get('trademarks'),
    			'productGroups' => Cache::get('productGroups')
			]);
    }
}
