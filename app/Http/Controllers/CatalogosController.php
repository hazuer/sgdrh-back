<?php

namespace App\Http\Controllers;

use App\Types\Catalogo\Custom\Documento;
use App\Types\Catalogo\Response\DocumentoResponse;
use App\Types\Catalogo\Custom\Expediente;
use App\Types\Catalogo\Response\ExpedienteResponse;

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
        $this->repository = \App::make('App\Repositories\ComboRepository');
    }

    /**
     * Listado de todos los expedientes
     *
     * @return App\Types\Catalogo\Response\ExpedienteResponse
     */
    public function getAllExpedientes()
    {
        try
        {        
            return new ExpedienteResponse(1, 'Éxito', $this->repository->getAllExpedientes()
                ->map(function ($row) {
                    return new Expediente($row);
                }));
        }
        catch (\Exception $e)
        {
            return new ExpedienteResponse(100, $e->getMessage());
        }
    }

    /**
     * Obtener el listado de documento por expediente
     *
     * @param App\Types\Catalogo\Request\DocumentoRequest $request
     *
     * @return App\Types\Catalogo\Response\DocumentoResponse
     */
    public function getDocumentosByIdExpediente($request)
    {
        try
        {        
            return new DocumentoResponse(1, 'Éxito', $this->repository->getDocumentosByIdExpediente($request)
                ->map(function ($row) {
                    return new Documento($row);
                }));
        }
        catch (\Exception $e)
        {
            return new DocumentoResponse(100, $e->getMessage());
        }
    }

}
