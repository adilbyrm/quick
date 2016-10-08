<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DealerProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'dealerRequest']);
	}

    public function profile()
    {
    	return 'profile';
    }

    public function dealerRequest()
    {
    	return 'dealership request';
    }
}
