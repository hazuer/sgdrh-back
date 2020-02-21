<?php

namespace App\Repositories;

use App\Models\CatDocumentoModel;

class CatalogosRepository
{

    public function getAllDocumentos()
    {
        return CatDocumentoModel::all();
    }

}
