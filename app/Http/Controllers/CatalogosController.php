<?php

namespace App\Http\Controllers;

use App\Types\Catalogos\Custom\Genero;
use App\Types\Catalogos\Custom\TipoDocumento;
use App\Types\Catalogos\Response\GeneroResponse;
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
     * Lista de géneros
     *
     * @return App\Types\Catalogos\Response\GeneroResponse
     */
    public function getAllGeneros()
    {
        try
        {        
            return new GeneroResponse(1, 'Éxito', $this->repository->getAllGeneros()
                ->map(function ($row) {
                    return new Genero($row);
                }));
        }
        catch (\Exception $e)
        {
            return new GeneroResponse(100, $e->getMessage());
        }
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
            return new TipoDocumentoResponse(1, 'Éxito', $this->repository->getAllDocumentos()
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
