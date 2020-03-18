<?php

namespace App\Repositories;

use App\Models\CapturistaModel;

class CapturistaRepository
{
    public function All()
    {

        $q = CapturistaModel::where([
            ['id_cat_perfil', 2],
            ['id_estatus', 1]
        ])
        ->get();

        return $q;
    }

    public function store($request)
    {
        return \DB::transaction(function () use ($request) {

            $q = CapturistaModel::where([
            ['email', $request->email],
            ['id_estatus', 1]
            ]);

            $valid = $q->first();

            //Usuario ya existe
            if (count($valid)===1)
                return ["code" => 2, "message"=> "El usuario ya existe."];

                $record                = new CapturistaModel();
                $record->name          = $request->name;
                $record->email         = $request->email;
                $record->password      = bcrypt($request->password);
                $record->id_cat_perfil = 2;
                $record->id_estatus    = 1;
                $record->save();

                return ["code" => 1, "message"=> "Éxito."];
            });
    }

    public function destroy($request)
    {
        return \DB::transaction(function () use ($request) {
            CapturistaModel::findOrFail($request->id)->delete();
        });
    }

    public function update($request)
    {
        return \DB::transaction(function () use ($request) {
            $record           = CapturistaModel::findOrFail($request->id);
            $record->password = bcrypt("12345");
            $record->save();
        });
    }

}
