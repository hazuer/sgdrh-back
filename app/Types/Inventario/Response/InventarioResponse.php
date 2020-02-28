<?php

namespace App\Types\Inventario\Response;

class InventarioResponse
{
    /**
     * @var integer
     */
    public $code;

    /**
     * @var string
     */
    public $message;

    /**
     * @var App\Types\Inventario\Custom\Inventario[]
     */
    public $data;

    public function __construct($code, $message = '', $data = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = $data;
    }
}
