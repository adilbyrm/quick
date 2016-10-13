<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\FrontController;

class DealerProfileController extends FrontController
{
	public function __construct()
	{
        parent::__construct();
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
