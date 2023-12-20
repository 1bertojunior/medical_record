<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add(){
        return view('app.users_add', ['title' => 'Adicionar Usuário']);
    }

    public function create(Request $request){

        $request->validate(
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'O campo de nome é obrigatório.',
                'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.email' => 'O formato do e-mail é inválido.',
                'password.required' => 'O campo de senha é obrigatório.',
                'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            ]);  

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $result = $user->save();

        if( $result ){
            return redirect()->route('app.users')->with('success', 'Usuário criado com sucesso!');;
        }else{
            return redirect()->route('app.users')->withErrors(['error' => 'Error ao criar usuário, tente novamente!']);
        }
        
    }

    public function edit($id){
        $user = User::findOrFail($id);

        return view('app.user_edit', ['title' => 'Editando Usuário', 'user' => $user]);
    }

    public function update(Request $request){

        $user = User::findOrFail($request->id);
        $result = $user->update($request->all());

        if($result){
            return redirect()->route('app.users')->with('success', 'Usuário editado com sucesso!');
        }else{
            return redirect()->route('app.users')->withErrors(['error' => 'Error ao editar usuário, tente novamente mais tarde!']);
        }
    }

    public function details($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(
                [
                    'Nome' => $user->name,
                    'E-mail' => $user->email,
                ]
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }
}
