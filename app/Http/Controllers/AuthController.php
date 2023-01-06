<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)){
            return 1;
        }else return 2;

    }
    public function getLogin(){
        return view('login');
    }
}
