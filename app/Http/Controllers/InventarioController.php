<?php

namespace App\Http\Controllers;

use App\Types\Inventario\Custom\Inventario;
use App\Types\Inventario\Response\InventarioResponse;

/**
 * Clase de servicio para Web Service de Inventario
 *
 * @author Isidoro Cornelio
 */
class InventarioController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\InventarioRepository');
    }

    /**
     * Listado de todos los Inventarios
     *
     * @return App\Types\Inventario\Response\InventarioResponse
     */
    public function getInventario()
    {
        try
        {
            return new InventarioResponse(1, 'Éxito', $this->repository->All()
                ->map(function ($row) {
                    return new Inventario($row);
                }));
        }
        catch (\Exception $e)
        {
            return new InventarioResponse(100, $e->getMessage());
        }
    }

}
