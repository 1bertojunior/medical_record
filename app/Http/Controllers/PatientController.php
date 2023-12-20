<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create(){
        return view('app.patient_add', ['title' => 'Adiconar Paciente']);
    }

    public function store(Request $request){
        

        // Recuperar os valores antigos do request em caso de erro de validação
        $oldValues = $request->old();

        // Validar o request
        $request->validate(
            [
                'name' => 'required|min:5',
                'cpf' => 'required|string|min:11|max:11',
                'sus_card' => 'nullable|string|min:15|max:15',
                'phone' => 'required|string|min:10|max:15',
                'birth_date' => 'required|date',
                'notes' => 'nullable|string',
            ],
            [
                'name.required' => 'O campo de nome é obrigatório.',
                'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
                'cpf.required' => 'O campo de CPF é obrigatório.',
                'cpf.string' => 'O CPF deve ser uma string.',
                'cpf.min' => 'O CPF deve ter :min caracteres.',
                'cpf.max' => 'O CPF não deve ter mais que :max caracteres.',
                'sus_card.min' => 'O Número do SUS deve ter :min caracteres.',
                'sus_card.max' => 'O Número do SUS não deve ter mais que :max caracteres.',
                'phone.required' => 'O campo de telefone é obrigatório.',
                'phone.string' => 'O telefone deve ser uma string.',
                'phone.min' => 'O telefone deve ter no mínimo :min caracteres.',
                'phone.max' => 'O telefone não deve ter mais que :max caracteres.',
                'birth_date.required' => 'O campo de data de nascimento é obrigatório.',
                'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
                'notes.string' => 'As anotações devem ser uma string.',
            ]
        );

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->cpf = $request->cpf;
        $patient->sus_card = $request->sus_card;
        $patient->phone = $request->phone;
        $patient->birth_date = $request->birth_date;
        $patient->notes = $request->notes;
        
        // Salvar o paciente no banco de dados
        $result = $patient->save();
        
        if ($result) {
            return redirect()->route('app.patient')->with('success', 'Paciente criado com sucesso!');
        } else {
            return redirect()->route('app.patient')->withErrors(['error' => 'Erro ao criar paciente, tente novamente!']);
        }
                
    }

    public function edit($id){
        $patient = Patient::findOrFail($id);
        return view('app.patient_edit', ['title' => 'Editando Paciente', 'patient' => $patient]);
    }

    public function update(Request $request){
        $patient = Patient::findOrFail($request->id);
        
        $result = $patient->update($request->all());

        if($result){
            return redirect()->route('app.patient')->with('success', 'Paciente editado com sucesso!');
        }else{
            return redirect()->route('app.patient')->withErrors(['error' => 'Error ao editar paciente, tente novamente mais tarde!']);
        }
    }

    public function details($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            
            return response()->json(
                [
                    'Nome' => $patient->name,
                    'Data de Nascimento' => $patient->formatted_birth_date,
                    'CPF' => $patient->formatted_cpf,
                    'Telefone' => $patient->formatted_phone,
                    'Cartão SUS' => $patient->formatted_sus_card,
                    'Observações' => $patient->notes,
                ]
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Paciente não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }
}
