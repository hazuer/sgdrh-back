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
    public $nombre_empleado;

    /**
     * @var integer
     */
    public $id_cat_doc;

    public function __construct($row)
    {
        $this->id_expediente    = $row->id_expediente ?? 0;
        $this->numero_empleado    = $row->numero_empleado ?? '';
        $this->nombre_empleado  = $row->nombre_empleado ?? '';
        $this->id_cat_doc          = $row->id_cat_doc ?? 0;
        
   }
}
