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
            'file_path' => 'required|image',
            'complaints' => 'nullable|string',
            'disease_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'follow_up_instructions' => 'nullable|string',
        ]);

        $medicalRecord = new MedicalRecord();
        $medicalRecord->patient_id = $request->patient_id;
        $medicalRecord->healthcare_professional_id = $request->healthcare_professional_id;
        $medicalRecord->complaints = $request->complaints;
        $medicalRecord->disease_history = $request->disease_history;
        $medicalRecord->allergies = $request->allergies;
        $medicalRecord->diagnosis = $request->diagnosis;
        $medicalRecord->follow_up_instructions = $request->follow_up_instructions;
        
        if( $request->hasFile('file_path') && $request->file('file_path')->isValid() ){
            $currentDate = date('Y/m');
            $imageName = $request->file_path->getClientOriginalName();
            $request->file_path->storeAs('public/medical_records/' . $currentDate, $imageName);
            $medicalRecord->file_path = $currentDate . '/' . $imageName;
        }

        $result = $medicalRecord->save();

        if ( $result ) {
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
            return response()->json($medicalRecord);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Registro médico não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }
}
