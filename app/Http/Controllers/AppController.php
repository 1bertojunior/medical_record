<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function admin(){
        return view('app.admin', ['title' => 'Admin']);
    }

    public function users(){
        return view('app.users', ['title' => 'Usuários']);
    }
}
