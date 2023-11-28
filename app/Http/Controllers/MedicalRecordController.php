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

        // Lógica para armazenar o prontuário médico no banco de dados
        $medicalRecord = new MedicalRecord();
        $medicalRecord->patient_id = $request->patient_id;
        $medicalRecord->healthcare_professional_id = $request->healthcare_professional_id;
        $medicalRecord->chief_complaint = $request->chief_complaint;
        $medicalRecord->history_of_present_illness = $request->history_of_present_illness;
        $medicalRecord->past_medical_history = $request->past_medical_history;
        $medicalRecord->family_history = $request->family_history;
        $medicalRecord->physical_examination = $request->physical_examination;
        $medicalRecord->diagnosis = $request->diagnosis;
        $medicalRecord->treatment_plan = $request->treatment_plan;
        $medicalRecord->medications = $request->medications;
        $medicalRecord->follow_up_instructions = $request->follow_up_instructions;
        $medicalRecord->save();

        return redirect()->route('app.medical_records')->with('success', 'Prontuário médico criado com sucesso!');
    }

    public function edit($id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        return view('app.medical_record_edit', [
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
}
