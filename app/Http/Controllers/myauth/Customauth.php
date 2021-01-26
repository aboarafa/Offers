<?php

namespace App\Http\Controllers\myauth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class Customauth extends Controller
{
    public function adault(){

        return view('customauth.index');
    }
    public function site(){

        return view('site');
    }
    public function admin(){

        return view('admin');
    }
    public function adminlog(){

        return view('auth.adminlogin');
    }
    public function admindata(Request $request)
    {
        $this-> validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')-> attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));     
    }
}
