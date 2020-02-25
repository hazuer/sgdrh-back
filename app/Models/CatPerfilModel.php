<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPerfilModel extends Model
{
    protected $table         = 'cat_perfiles';
    protected $primaryKey    = 'id_cat_perfil';
    protected $delete_fields = ['id_estatus'];

}