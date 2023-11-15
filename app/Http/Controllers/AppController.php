<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function admin(){
        return view('app.admin', ['title' => 'Admin']);
    }

    public function users(){

        $users = User::all();
        
        return view('app.users', ['title' => 'Usuários', 'users' => $users] );
    }
}
