<?php

namespace App\Types\Documento\Custom;

class Documento
{
    /**
     * @var integer
     */
    public $id_exp_doc;

    /**
     * @var integer
     */
    public $id_expediente;

    /**
     * @var integer
     */
    public $id_cat_doc;

    public function __construct($row)
    {
        $this->id_exp_doc    = $row->id_exp_doc ?? 0;
        $this->id_expediente = $row->id_expediente ?? 0;
        $this->id_cat_doc    = $row->id_cat_doc ?? 0;
    }
}
