<?php

namespace App\Types\Inventario\Custom;

class Inventario
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
    public $ap_paterno;

    /**
     * @var string
     */
    public $ap_materno;

    /**
     * @var string
     */
    public $nombres;
    /**
     * @var integer
     */
    public $id_cat_doc;

    public function __construct($row)
    {
        $this->id_expediente    = $row->Expediente->id_expediente ?? 0;
        $this->numero_empleado    = $row->Expediente->numero_empleado ?? '';
        $this->ap_paterno  = $row->Expediente->ap_paterno ?? '';
        $this->ap_materno  = $row->Expediente->ap_materno ?? '';   
        $this->nombres  = $row->Expediente->nombres ?? '';
        $this->id_cat_doc          = $row->id_cat_doc ?? 0;
        
   }
}
