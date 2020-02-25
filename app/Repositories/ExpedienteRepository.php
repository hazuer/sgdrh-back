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

    public function store($request)
    {
        return \DB::transaction(function () use ($request) {

            $record = new ExpedienteModel();
            $record->numero_empleado  = $request->numero_empleado;
            $record->nombres          = $request->nombres;
            $record->ap_paterno       = $request->ap_paterno;
            $record->ap_materno       = $request->ap_materno;
            $record->id_cat_genero    = $request->id_cat_genero;
            $record->fecha_nacimiento = $request->fecha_nacimiento;
            $record->email            = $request->email;
            $record->curp             = $request->curp;
            $record->rfc              = $request->rfc;
            $record->puesto           = $request->puesto;
            $record->id_estatus       = 1;
            $record->save();

            return ['id_expediente' => $record->id_expediente];
        });
    }

    public function update($request)
    {
        return \DB::transaction(function () use ($request) {
            $record = ExpedienteModel::findOrFail($request->id_expediente);

            $record->numero_empleado  = $request->numero_empleado;
            $record->nombres          = $request->nombres;
            $record->ap_paterno       = $request->ap_paterno;
            $record->ap_materno       = $request->ap_materno;

            if(!\Utils:: isEmpty($request->id_cat_genero, true))
            $record->id_cat_genero    = $request->id_cat_genero;

            $record->fecha_nacimiento = $request->fecha_nacimiento;
            $record->email            = $request->email;
            $record->curp             = $request->curp;
            $record->rfc              = $request->rfc;
            $record->puesto           = $request->puesto;

            $record->save();
        });
    }

}
