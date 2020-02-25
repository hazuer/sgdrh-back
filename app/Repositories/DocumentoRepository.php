<?php

namespace App\Repositories;

use App\Models\ExpedienteDocModel;

class DocumentoRepository
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

        public function store($request)
    {
        return \DB::transaction(function () use ($request) {
       
            $q = ExpedienteDocModel::where([
            ['id_expediente', $request->id_expediente],
            ['id_cat_doc', $request->id_cat_doc],
            ['id_estatus', 1]
            ])
            ->get();

            if (count($q)===1)
                throw new \Exception('Documento duplicado.');

            $record = new ExpedienteDocModel();
            $record->id_expediente = $request->id_expediente;
            $record->id_cat_doc = $request->id_cat_doc;
            $record->id_estatus = 1;
            $record->save();

            return ['id_exp_doc' => $record->id_exp_doc];
        });
    }

    public function destroy($request)
    {
        return \DB::transaction(function () use ($request) {
            ExpedienteDocModel::findOrFail($request->id_exp_doc)->delete();
        });
    }
}
