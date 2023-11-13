<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('app.auth.login', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.email' => 'O formato do e-mail é inválido.',
                'password.required' => 'O campo de senha é obrigatório.',
                'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            ]);  

        $credentials = $request->only('email', 'password');

        $authenticated = Auth::attempt($credentials);

        if ( $authenticated ) {
            return redirect()->intended('/admin');
        } else {
            return redirect()->route('app.showLogin')->withErrors(['error' => 'E-mail ou senha inválidos']);
        }
    }
}
