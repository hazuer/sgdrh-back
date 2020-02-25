<?php

namespace App\Http\Controllers;

use App\Types\Capturista\Custom\Capturista;
use App\Types\Capturista\Response\CapturistaResponse;


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
            return new CapturistaResponse(1, 'Éxito', $this->repository->getAllCapturistas()
                ->map(function ($row) {
                    return new Capturista($row);
                }));
        }
        catch (\Exception $e)
        {
            return new CapturistaResponse(100, $e->getMessage());
        }
    }

}
