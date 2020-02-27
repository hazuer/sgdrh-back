<?php

namespace App\Http\Controllers;

use App\Types\User\Custom\User;
use App\Types\User\Response\UserResponse;

/**
 * Clase de servicio para Web Service de Auth de Usuarios
 *
 * @author Isidoro Cornelio
 */
class UserController
{
    private $repository;

    public function __construct()
    {
        $this->repository = \App::make('App\Repositories\UserRepository');
    }

    /**
     * Login para inicio de sesión
     *
     * @param App\Types\User\Request\LoginRequest $request
     *
     * @return App\Types\User\Response\UserResponse
     * @throws SoapFault
     * @author Isidoro Cornelio
     */
    public function login($request)
    {
        try
        {
            return new UserResponse(1, 'Éxito', $this->repository->login($request)
                ->map(function ($row) {
                    return new User($row);
                }));
        }
        catch (\Exception $e)
        {
            return new UserResponse(100, $e->getMessage());
        }
    }

    /**
     *
     * Actualizacíon de contraseña
     *
     * @param App\Types\User\Request\UpdatePasswordRequest $request
     *
     * @return App\Types\User\Response\UserResponse
     * @throws SoapFault
     * @author Isidoro Cornelio
     */
    public function updatePassword($request)
    {
        try{
            $data =  $this->repository->update($request);

            return new UserResponse($data['code'], $data['message']);
        }catch(\Exception $e){
            return new UserResponse(100, $e->getMessage());
        }
    }
}