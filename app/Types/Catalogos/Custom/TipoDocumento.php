<?php

namespace App\Types\Catalogos\Custom;

class TipoDocumento
{
    /**
     * @var integer
     */
    public $id_cat_doc;

    /**
     * @var string
     */
    public $documento;

    public function __construct($row)
    {
        $this->id_cat_doc    = $row->id_cat_doc ?? 0;
        $this->documento  = $row->documento ?? '';
    }
}
