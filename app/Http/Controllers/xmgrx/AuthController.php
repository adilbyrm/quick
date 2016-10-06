<?php

namespace App\Http\Controllers\xmgrx;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller; -> AdminController'da kullanıldigi icin gerek yok.
use Validator;

class AuthController extends AdminController
{
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'adminLogout']);
        $this->middleware('XSSProtection', ['only' => ['adminLoginP']]);
    }

    public function adminLogin()
    {
        return view('xmgrx.auth.login');
    }

    public function adminLoginP(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Kullanıcı adı giriniz.',
            'password.required' => 'Şifre giriniz.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(auth()->guard('admin')->attempt(['username' => $request->email, 'password' => $request->password], true)) {
            return redirect()->intended('xmgrx/');
        }
        return back()->with('failure', 'Doğrulama yapılamadı.');
    }

    public function adminLogout()
    {
        auth()->guard('admin')->logout();
        return redirect('xmgrx/');
    }
}
