<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessional;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function create()
    {
        $patients = Patient::all();
        $professionals = HealthcareProfessional::all();

        return view('app.medical_records_add', [
            'title' => 'Criar Prontuário Médico',
            'patients' => $patients,
            'professionals' => $professionals,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'healthcare_professional_id' => 'required|exists:healthcare_professionals,id',
            'file_path' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'complaints' => 'nullable|string',
            'disease_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'follow_up_instructions' => 'nullable|string',
        ]);

        if( $request->hasFile('file_path') && $request->file('file_path')->isValid() ){
            $currentDate = date('Y/m');
            $originalName = pathinfo($request->file_path->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file_path->getClientOriginalExtension();
            $fileName = $originalName . '_' . uniqid() . '.' . $extension;
            $request->file_path->storeAs('public/medical_records/' . $currentDate, $fileName);
            $filePath = 'storage/medical_records/' . $currentDate . '/' . $fileName;
            $request->request->remove('file_path');
        }
    

        $medicalRecord = MedicalRecord::create([
            'patient_id' => $request->get('patient_id'),
            'healthcare_professional_id' => $request->get('healthcare_professional_id'),
            'file_path' => $filePath ,
            'complaints' => $request->get('complaints'),
            'disease_history' => $request->get('disease_history'),
            'allergies' => $request->get('allergies'),
            'diagnosis' => $request->get('diagnosis'),
            'follow_up_instructions' => $request->get('follow_up_instructions'),
        ]);

        if ( $medicalRecord ) {
            return redirect()->route('app.medical_records')->with('success', 'Prontuário médico criado com sucesso!');
        } else {
            return redirect()->route('app.medical_records')->with('error', 'Ocorreu um erro ao criar o prontuário médico. Por favor, tente novamente.');
        }
    }

    public function edit($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        return view('app.medical_records_edit', [
            'title' => 'Editando Prontuário Médico',
            'medicalRecord' => $medicalRecord,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'healthcare_professional_id' => 'required|exists:healthcare_professionals,id',
            'chief_complaint' => 'nullable|string',
            'history_of_present_illness' => 'nullable|string',
            'past_medical_history' => 'nullable|string',
            'family_history' => 'nullable|string',
            'physical_examination' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment_plan' => 'nullable|string',
            'medications' => 'nullable|string',
            'follow_up_instructions' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,jpeg,png',
        ]);

        $medicalRecord = MedicalRecord::findOrFail($request->id);
        $medicalRecord->update($request->all());

        return redirect()->route('app.medical_records')->with('success', 'Prontuário médico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);
        $medicalRecord->delete();

        return redirect()->route('app.medical_records')->with('success', 'Prontuário médico excluído com sucesso!');
    }

    public function details($id)
    {
        try {
            $medicalRecord = MedicalRecord::with('healthcareProfessional')->findOrFail($id);
            
            return response()->json([
                'Nome do Profissional' => $medicalRecord->healthcareProfessional->name,
                'Nome do Paciente' => $medicalRecord->patient->name,
                'file' => $medicalRecord->file_path,
                'Queixa' => $medicalRecord->complaints,
                'História da Doença' => $medicalRecord->disease_history,
                'Alergias' => $medicalRecord->allergies,
                'Diagnóstico' => $medicalRecord->diagnosis,
                'Instruções de Acompanhamento' => $medicalRecord->follow_up_instructions,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Registro médico não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }
}
