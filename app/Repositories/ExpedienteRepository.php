<?php

namespace App\Repositories;

use App\Models\ExpedienteModel;

class ExpedienteRepository
{
    public function getAllExpedientes()
    {
        return ExpedienteModel::all();
    }
    
    public function getExpedienteById($request)
    {
        
        $q = ExpedienteModel::where([
            ['id_expediente', $request->id_expediente],
            ['id_estatus', 1]
        ])
        ->get();

        if (count($q)===0)
            throw new \Exception('Expediente no encontrado.');

        return $q;
    }
}
