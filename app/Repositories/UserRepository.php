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

}
