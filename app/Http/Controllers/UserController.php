<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add(){
        return view('app.users_add', ['title' => 'Adicionar Usuário']);
    }

    public function create(Request $request){

        $request->validate(
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'O campo de nome é obrigatório.',
                'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.email' => 'O formato do e-mail é inválido.',
                'password.required' => 'O campo de senha é obrigatório.',
                'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            ]);  

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $result = $user->save();

        if( $result ){
            return redirect()->route('app.users');
        }else{
            return redirect()->route('app.showLogin')->withErrors(['error' => 'Error ao criar usuário, tente novamente!']);
        }
        
    }
}
