<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteModel extends Model
{
    protected $table         = 'expedientes';
    protected $primaryKey    = 'id_expediente';
    protected $delete_fields = ['id_estatus'];

}