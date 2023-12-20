<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessionType;
use Illuminate\Http\Request;

class HealthcareProfessionTypeController extends Controller
{
    public function create(){
        return view('app.healthcare_profession_type_add', ['title' => 'Adiconar Tipo de Profissional']);
    }

    public function store(Request $request){
        $oldValues = $request->old();

        // Validar o request
        $request->validate(
            [
                'name' => 'required|min:5',
                'council_type' => 'required|min:3',
            ],
            [
                'name.required' => 'O campo de nome é obrigatório.',
                'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
                'council_type.required' => 'O campo de Conselho é obrigatório.',
                'council_type.min' => 'O Conselho deve ter :min caracteres.',
            ]
        );

        $type = new HealthcareProfessionType();
        $type->name = $request->name;
        $type->council_type = $request->council_type;
        
        // Salvar o paciente no banco de dados
        $result = $type->save();
        
        if ($result) {
            return redirect()->route('app.healthcare_profession_type')->with('success', 'Tipo de Profissional criado com sucesso!');
        } else {
            return redirect()->route('app.healthcare_profession_type')->withErrors(['error' => 'Erro ao criar Tipo de Profissional, tente novamente!']);
        }
                
    }

    public function edit($id){
        $type = HealthcareProfessionType::findOrFail($id);
        return view('app.healthcare_profession_type_edit', ['title' => 'Editando Tipo de Profissional', 'type' => $type]);
    }

    public function update(Request $request){
        $type = HealthcareProfessionType::findOrFail($request->id);
        
        $result = $type->update($request->all());

        if($result){
            return redirect()->route('app.healthcare_profession_type')->with('success', 'Tipo de Profissional editado com sucesso!');
        }else{
            return redirect()->route('app.healthcare_profession_type')->withErrors(['error' => 'Error ao editar Tipo de Profissional, tente novamente mais tarde!']);
        }
    }

    public function details($id)
    {
    try {
        $healthcareProfessionType = HealthcareProfessionType::findOrFail($id);
        return response()->json(
            [
                'Nome' => $healthcareProfessionType->name,
                'Conselho' => $healthcareProfessionType->council_type,
            ]
        );
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['error' => 'Tipo de profissão de saúde não encontrado'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro desconhecido'], 500);
    }
    }
}
