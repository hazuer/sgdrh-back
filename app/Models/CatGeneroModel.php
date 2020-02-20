<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatGeneroModel extends Model
{
    protected $table         = 'cat_generos';
    protected $primaryKey    = 'id_cat_genero';
    protected $delete_fields = ['id_estatus'];

}