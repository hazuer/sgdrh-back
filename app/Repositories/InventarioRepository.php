<?php

namespace App\Repositories;

use App\Models\ExpedienteDocModel;

class InventarioRepository
{
   public function All()
    {
        return ExpedienteDocModel::select(
            "expedientes.id_expediente"
            ,"expedientes.numero_empleado"
            ,\DB::raw("concat(expedientes.ap_paterno, ' ', expedientes.ap_materno, ' ', expedientes.nombres) AS nombre_empleado")
            ,"ed.id_cat_doc")
            ->from("expedientes")
            ->where('expedientes.id_estatus', 1)
            ->orderBy('expedientes.id_expediente', 'asc')
            ->leftJoin("expedientes_docs as ed", "ed.id_expediente", "=", "expedientes.id_expediente")
            ->get();
    }

}
