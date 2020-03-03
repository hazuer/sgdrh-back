<?php

namespace App\Http\Controllers;

use App\Types\Capturista\Custom\Capturista;
use App\Types\Capturista\Response\CapturistaResponse;
use App\Types\Capturista\Response\AltaCapturistaResponse;

/**
 * Clase de servicio para Web Service de Capturistas
 *
 * @author Isidoro Cornelio
 */
class CapturistasController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\CapturistaRepository');
    }

    /**
     * Listado de todos los capturistas
     *
     * @return App\Types\Capturista\Response\CapturistaResponse
     */
    public function getAllCapturistas()
    {
        try
        {
            return new CapturistaResponse(1, 'Éxito', $this->repository->All()
                ->map(function ($row) {
                    return new Capturista($row);
                }));
        }
        catch (\Exception $e)
        {
            return new CapturistaResponse(100, $e->getMessage());
        }
    }

    /**
     * Registro de capturista
     *
     * @param App\Types\Capturista\Request\AltaCapturistaRequest $request
     *
     * @return App\Types\Capturista\Response\AltaCapturistaResponse
     * @author Isidoro Cornelio
     */
    public function altaCapturista($request)
    {
        try
        {
            $data =  $this->repository->store($request);

            return new AltaCapturistaResponse($data['code'], $data['message']);
        }
        catch(\Exception $e)
        {
            return new AltaCapturistaResponse(100, $e->getMessage());
        }
    }

    /**
     * Eliminación lógica de capturista
     *
     * @param App\Types\Capturista\Request\BajaCapturistaRequest $request
     *
     * @return App\Types\Capturista\Response\CapturistaResponse
     */
    public function bajaCapturista($request)
    {
        try
        {
            $this->repository->destroy($request);

            return new CapturistaResponse(1, 'Éxito.');
        }
        catch(\Exception $e)
        {
            return new CapturistaResponse(100, $e->getMessage());
        }
    }

}
