<?php

namespace App\Repositories;

use App\Models\ExpedienteDocModel;

class InventarioRepository
{
   public function All()
    {
        return ExpedienteDocModel::all();
    }
   
}
