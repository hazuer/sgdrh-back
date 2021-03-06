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

    /**
     * @var string
     */
    public $documento;

    /**
     * @var string
     */
    public $name_file;

    public function __construct($row)
    {
        $this->id_exp_doc    = $row->id_exp_doc ?? 0;
        $this->id_expediente = $row->id_expediente ?? 0;
        $this->id_cat_doc    = $row->id_cat_doc ?? 0;
        $this->documento     = $row->CatDocumento->documento ?? '';
        $this->name_file     = $row->name_file ?? '';
    }
}
