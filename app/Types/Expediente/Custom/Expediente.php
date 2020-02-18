<?php

namespace App\Types\Expediente\Custom;

class Expediente
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

    public function __construct($row)
    {
        $this->id_expediente    = $row->id_expediente ?? 0;
        $this->numero_empleado  = $row->numero_empleado ?? '';
        $this->nombres          = $row->nombres ?? '';
        $this->ap_paterno       = $row->ap_paterno ?? '';
        $this->ap_materno       = $row->ap_materno ?? '';
        $this->id_cat_genero    = $row->id_cat_genero ?? 0;
        $this->fecha_nacimiento = $row->fecha_nacimiento ?? '';
        $this->email            = $row->email ?? '';
        $this->curp             = $row->curp ?? '';
        $this->rfc              = $row->rfc ?? '';
        $this->puesto           = $row->puesto ?? '';
    }
}
