<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
        return view('authentication.index');
    }

    public function postlogin(Request $request)
    {
       
        if (Auth::attempt($request->only('email', 'password'))) 
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if(Auth::user()->hasrole('admin'))  {
                return redirect('home');
            } elseif(Auth::user()->hasrole('operator')){
                return redirect('/operator/home');
            } else {
                
                $request->session()->flash('norole', 'Akun Anda Belum Mempunyai Role');
                return redirect('/login');
            }
        }
       // $request->session()->flash('noaccount', 'Username dan Password Belu terisi');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
