<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(){
        return view('app.users_add', ['title' => 'Adicionar Usuário']);
    }

    public function create(Request $request){
        dd($request);
    }
}
