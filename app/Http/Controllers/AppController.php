<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessionType;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function admin(){
        return view('app.admin', ['title' => 'Admin']);
    }

    public function users(){

        $users = User::all();
        
        return view('app.users', ['title' => 'Usuários', 'users' => $users] );
    }

    public function profile(){
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        return view('app.profile', ['title' => 'Perfil', 'user' => $user]);
    }

    public function patient(){
        $patients = Patient::all();
        return view('app.patient', ['title' => 'Pacientes', 'patients' => $patients]);
    }

    public function healthcareProfessionType() {
        $types = HealthcareProfessionType::all();
        return view('app.healthcare_profession_type', ['title' => 'Tipos de profissionais', 'types' => $types]);
    }

}
