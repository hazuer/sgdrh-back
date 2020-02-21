<?php

namespace App\Http\Controllers;

use App\Types\Expediente\Custom\Expediente;
use App\Types\Expediente\Response\ExpedienteResponse;
use App\Types\Expediente\Custom\AltaExpediente;
use App\Types\Expediente\Response\AltaExpedienteResponse;

/**
 * Clase de servicio para Web Service de Expedientes
 * 
 * @author Isidoro Cornelio
 */
class ExpedientesController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\ExpedienteRepository');
    }

    /**
     * Listado de todos los expedientes
     *
     * @return App\Types\Expediente\Response\ExpedienteResponse
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
     * Obtener los datos del expediente por id
     *
     * @param App\Types\Expediente\Request\ExpedienteRequest $request
     *
     * @return App\Types\Expediente\Response\ExpedienteResponse
     */
    public function getExpedienteById($request)
    {
        try
        {
            return new ExpedienteResponse(1, 'Éxito', $this->repository->getExpedienteById($request)
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
     * Registro de expediente
     *
     * @param App\Types\Expediente\Request\AltaExpediente $request
     *
     * @return App\Types\Expediente\Response\AltaExpedienteResponse
     */
    public function altaExpediente($request)
    {
        try
        {
            return new AltaExpedienteResponse(1, 'Éxito.', $this->repository->store($request));
        }
        catch(\Exception $e)
        {
            return new AltaExpedienteResponse(100, $e->getMessage());
        }
    }

}
