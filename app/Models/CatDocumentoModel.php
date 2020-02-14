<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDocumentoModel extends Model
{
    protected $table         = 'cat_documentos';
    protected $primaryKey    = 'id_cat_doc';
    protected $delete_fields = ['id_estatus'];

}