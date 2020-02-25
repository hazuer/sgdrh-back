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

}
