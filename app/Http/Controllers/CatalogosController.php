<?php

namespace App\Http\Controllers;

use App\Types\Catalogos\Custom\TipoDocumento;
use App\Types\Catalogos\Response\TipoDocumentoResponse;


/**
 * Clase de servicio para Web Service de Cátalogos
 *
 * @author Isidoro Cornelio
 */
class CatalogosController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\CatalogosRepository');
    }

    /**
     * Listado de todos los tipos de documentos
     *
     * @return App\Types\Catalogos\Response\TipoDocumentoResponse
     */
    public function getAllDocumentos()
    {
        try
        {
            return new TipoDocumentoResponse(1, 'Éxito', $this->repository->All()
                ->map(function ($row) {
                    return new TipoDocumento($row);
                }));
        }
        catch (\Exception $e)
        {
            return new TipoDocumentoResponse(100, $e->getMessage());
        }
    }

}
