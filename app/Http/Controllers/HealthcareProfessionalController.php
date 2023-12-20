<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessional;
use App\Models\HealthcareProfessionType;
use Illuminate\Http\Request;

class HealthcareProfessionalController extends Controller
{
    public function create()
    {
        $title = 'Adicionar Profissional de Saúde';
        $professionTypes = HealthcareProfessionType::all();

        return view('app.professional_add', compact('title', 'professionTypes'));
    }

    public function store(Request $request)
    {
        $oldValues = $request->old();

        // Validar o request
        $request->validate(
            [
                'name' => 'required|min:5',
                'document_number' => 'required|min:3',
                'profession_type_id' => 'required',
            ],
            [
                'name.required' => 'O campo de nome é obrigatório.',
                'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
                'document_number.required' => 'O campo de Documento é obrigatório.',
                'document_number.min' => 'O Documento deve ter :min caracteres.',
                'profession_type_id.required' => 'O campo Tipo de Profissional é obrigatório.',
            ]
        );

        $professional = new HealthcareProfessional();
        $professional->name = $request->name;
        $professional->document_number = $request->document_number;
        $professional->profession_type_id = $request->profession_type_id;

        // Salvar o profissional de saúde no banco de dados
        $result = $professional->save();

        if ($result) {
            return redirect()->route('app.healthcare_professionals')->with('success', 'Profissional de Saúde criado com sucesso!');
        } else {
            return redirect()->route('app.healthcare_professionals')->withErrors(['error' => 'Erro ao criar Profissional de Saúde, tente novamente!']);
        }
    }

    public function edit($id)
    {
        $professional = HealthcareProfessional::findOrFail($id);
        $professionTypes = HealthcareProfessionType::all();

        return view('app.professional_edit', [
            'title' => 'Editando Profissional de Saúde',
            'professional' => $professional,
            'professionTypes' => $professionTypes
        ]);
    }

    public function update(Request $request)
    {
        $professional = HealthcareProfessional::findOrFail($request->id);

        $result = $professional->update($request->all());

        if ($result) {
            return redirect()->route('app.healthcare_professionals')->with('success', 'Profissional de Saúde editado com sucesso!');
        } else {
            return redirect()->route('app.healthcare_professionals')->withErrors(['error' => 'Erro ao editar Profissional de Saúde, tente novamente mais tarde!']);
        }
    }

    public function details($id)
    {
        try {
            $healthcareProfessional = HealthcareProfessional::with('professionType')->findOrFail($id);
            return response()->json([
                'Nome' => $healthcareProfessional->name,
                'Tipo de Profissão' => $healthcareProfessional->professionType->name,
                'Registro do Conselho' => $healthcareProfessional->document_number . ' (' . $healthcareProfessional->professionType->council_type . ')',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Profissional de saúde não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }
}
