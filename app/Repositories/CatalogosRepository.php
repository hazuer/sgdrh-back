<?php

namespace App\Repositories;

use App\Models\CatGeneroModel;
use App\Models\CatDocumentoModel;

class CatalogosRepository
{
    public function getAllGeneros()
    {
        return CatGeneroModel::all();
    }
    
    public function getAllDocumentos()
    {
        return CatDocumentoModel::all();
    }

}
