<?php

namespace App\Repositories;
use App\Models\CapturistaModel;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function login($request)
    {
        $q = CapturistaModel::where([
            ['email', $request->email],
            ['id_estatus', 1]
        ]);

        $valid = $q->first();
        
        //No se encontró usuario
        if (count($valid)===0)
            throw new \Exception('Usuario o contraseña incorrecto, verifique la información.');
        
        //Contraseña incorrecta
        if (!Hash::check($request->password, $valid->password)) 
            throw new \Exception('Usuario o contraseña incorrecto, verifique la información.');

        return $q->get();
    }

    public function update($request)
    {
        return \DB::transaction(function () use ($request) {

            $q = CapturistaModel::where([
            ['id', $request->id_usuario],
            ['id_estatus', 1]
            ]);

            $valid = $q->first();
            //Usuario NO existe
            if (count($valid)===0)
                return ["code" => 4, "message"=> "El usuario no existe."];
            $record = CapturistaModel::findOrFail($request->id_usuario);

            //Las contraseñas no coinciden
            if ($request->new_pass!=$request->new_pass_conf)
                return ["code" => 2, "message"=> "Las contraseñas registradas no coinciden."];
            
            //Contraseña incorrecta
            if (!Hash::check($request->pass_actual, $record->password)) 
                return ["code" => 3, "message"=> "La contraseña no es correcta."];

            $record->password = bcrypt($request->new_pass);
            $record->save();
            return ["code" => 1, "message"=> "Éxito."];
        });
    }
 
}
