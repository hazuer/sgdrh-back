<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapturistaModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $delete_fields = ['id_estatus'];

    /* Relaciones */
    public function CatPerfil()
    {
        return $this->hasOne('App\Models\CatPerfilModel', 'id_cat_perfil', 'id_cat_perfil');
    }

}