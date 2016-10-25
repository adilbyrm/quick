<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class EmployeeController extends FrontController
{
    public function login()
    {
    	return session::all();
    	return view('front.employee.employee_login');
    }
}
