<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteDocModel extends Model
{
    protected $table         = 'expedientes_docs';
    protected $primaryKey    = 'id_exp_doc';
    protected $delete_fields = ['id_estatus'];

    /* Relaciones */
    public function CatDocumento()
    {
        return $this->hasOne('App\Models\CatDocumentoModel', 'id_cat_doc', 'id_cat_doc');
    }

}