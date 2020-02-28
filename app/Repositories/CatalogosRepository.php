<?php

namespace App\Repositories;

use App\Models\CatDocumentoModel;

class CatalogosRepository
{

    public function All()
    {
        return CatDocumentoModel::all();
    }

}
