<?php

namespace App\Http\Controllers;

use App\Types\Documento\Custom\Documento;
use App\Types\Documento\Response\DocumentoResponse;


/**
 * Clase de servicio para Web Service de Documentos
 * 
 * @author Isidoro Cornelio
 */
class DocumentosController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\DocumentoRepository');
    }

    /**
     * Obtener el listado de todos los documentos por id_expediente
     *
     * @param App\Types\Documento\Request\DocumentoRequest $request
     *
     * @return App\Types\Documento\Response\DocumentoResponse
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
