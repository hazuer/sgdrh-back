<?php

namespace App\Repositories;

use App\Models\CapturistaModel;

class CapturistaRepository
{
    public function getAllCapturistas()
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

            $record                = new CapturistaModel();
            $record->name          = $request->name;
            $record->email         = $request->email;
            $record->password      = bcrypt($request->password);
            $record->id_cat_perfil = 2;
            $record->id_estatus    = 1;
            $record->save();

            return ['id' => $record->id];
        });
    }

    public function destroy($request)
    {
        return \DB::transaction(function () use ($request) {
            CapturistaModel::findOrFail($request->id)->delete();
        });
    }

}
