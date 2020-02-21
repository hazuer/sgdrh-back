<?php

namespace App\Types\Expediente\Request;

class EdicionExpedienteRequest
{
    /**
     * @var integer
     */
    public $id_expediente;
    
    /**
     * @var string
     */
    public $numero_empleado;

    /**
     * @var string
     */
    public $nombres;

    /**
     * @var string
     */
    public $ap_paterno;

    /**
     * @var string
     */
    public $ap_materno;

    /**
     * @var integer
     */
    public $id_cat_genero;

    /**
     * @var string
     */
    public $fecha_nacimiento;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $curp;

    /**
     * @var string
     */
    public $rfc;

    /**
     * @var string
     */
    public $puesto;

}
