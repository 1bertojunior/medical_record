<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('app.auth.login', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
               
    }
}
