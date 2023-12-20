<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\HealthcareProfessional;
use App\Models\HealthcareProfessionType;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public $perPage = 10;

    public function admin(){
        return view('app.admin', ['title' => 'Admin']);
    }

    public function users(Request $request){

        $users = User::where('name', 'LIKE', "%{$request->search}%")
             ->orWhere('email', 'LIKE', "%{$request->search}%")
             ->paginate($this->perPage);
        
        return view('app.users', ['title' => 'Usuários', 'users' => $users] );
    }

    public function profile(){
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        return view('app.profile', ['title' => 'Perfil', 'user' => $user]);
    }

    public function patient(Request $request){
        $patients = Patient::where('name', 'LIKE', "%{$request->search}%")
             ->orWhere('cpf', 'LIKE', "%{$request->search}%")
             ->orWhere('sus_card', 'LIKE', "%{$request->search}%")
             ->orWhere('birth_date', 'LIKE', "%{$request->search}%")
             ->paginate($this->perPage);

        return view('app.patient', ['title' => 'Pacientes', 'patients' => $patients]);
    }

    public function healthcareProfessionType(Request $request) {
        $types = HealthcareProfessionType::where('name', 'LIKE', "%{$request->search}%")
             ->orWhere('council_type', 'LIKE', "%{$request->search}%")
             ->paginate($this->perPage);

        return view('app.healthcare_profession_type', ['title' => 'Tipos de profissionais', 'types' => $types]);
    }

    public function healthcareProfessionals(Request $request){ 
        $professionals = HealthcareProfessional::where('name', 'LIKE', "%{$request->search}%")
             ->orWhere('document_number', 'LIKE', "%{$request->search}%")
             ->orWhereHas('professionType', function ($query) use ($request) {
                 $query->where('name', 'LIKE', "%{$request->search}%");
             })
             ->paginate($this->perPage);

        return view('app.professional', ['title' => 'Profissionais', 'professionals' => $professionals]);
    }

    public function medicalRecords(Request $request)
    {
        $medicalRecords = MedicalRecord::whereHas('patient', function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->search}%");
        })->paginate($this->perPage);
        return view('app.medical_records', ['title' => 'Prontuários Médicos', 'medicalRecords' => $medicalRecords]);
    }

    public function logsAccess(Request $request){
        $logs = AccessLog::where('action', 'LIKE', "%{$request->search}%")
        ->paginate($this->perPage);
        return view('app.logs_access', ['title' => 'Logs Acessos', 'logs' => $logs]);
    }

}
