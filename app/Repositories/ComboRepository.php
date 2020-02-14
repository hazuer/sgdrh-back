<?php

namespace App\Repositories;

use App\Models\ExpedienteDocModel;
use App\Models\ExpedienteModel;

class ComboRepository
{
    public function getDocumentosByIdExpediente($request)
    {
        
        $q = ExpedienteDocModel::where([
            ['id_expediente', $request->id_expediente],
            ['id_estatus', 1]
        ])
        ->get();

        if (count($q)===0)
            throw new \Exception('Expediente no encontrado.');

        return $q;
    }

    public function getAllExpedientes()
    {
        return ExpedienteModel::get();
    }
}
