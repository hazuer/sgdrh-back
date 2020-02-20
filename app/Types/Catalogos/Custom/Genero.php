<?php

namespace App\Types\Catalogos\Custom;

class Genero
{
    /**
     * @var integer
     */
    public $id_cat_genero;

    /**
     * @var string
     */
    public $genero;

    public function __construct($row)
    {
        $this->id_cat_genero    = $row->id_cat_genero ?? 0;
        $this->genero  = $row->genero ?? '';
    }
}
