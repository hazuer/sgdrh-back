<?php

namespace App\Http\Controllers;

use App\Types\Documento\Custom\Documento;
use App\Types\Documento\Response\DocumentoResponse;
use App\Types\Documento\Response\AltaDocumentoResponse;

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

    /**
     * Registro de documentos
     *
     * @param App\Types\Documento\Request\AltaDocumentoRequest $request
     *
     * @return App\Types\Documento\Response\AltaDocumentoResponse
     * @author Isidoro Cornelio
     */
    public function altaDocumento($request)
    {
        try
        {
            return new AltaDocumentoResponse(1, 'Éxito.', $this->repository->store($request));
        }
        catch(\Exception $e)
        {
            return new AltaDocumentoResponse(100, $e->getMessage());
        }
    }

    /**
     * Eliminación lógica de documento
     *
     * @param App\Types\Documento\Request\BajaDocumentoRequest $request
     *
     * @return App\Types\Documento\Response\DocumentoResponse
     */
    public function bajaDocumento($request)
    {
        try
        {
            $this->repository->destroy($request);

            return new DocumentoResponse(1, 'Éxito.');
        }
        catch(\Exception $e)
        {
            return new DocumentoResponse(100, $e->getMessage());
        }
    }
}
