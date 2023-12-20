<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use Illuminate\Http\Request;

class AccessLogController extends Controller
{
    public function details($id)
    {
        try {
            $accessLog = AccessLog::findOrFail($id);
            return response()->json(
                [
                    'Ação' => $accessLog->action,
                    'Modelo' => $accessLog->getModelName(),
                    'Endereço IP' => $accessLog->ip_address,
                    'Usuário' => $accessLog->user->name,
                    'Detalhes' => $accessLog->details,
                    'Resultado' => $accessLog->result,
                ]
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Registro de acesso não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro desconhecido'], 500);
        }
    }

}
