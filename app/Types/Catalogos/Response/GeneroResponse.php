<?php

namespace App\Types\Catalogos\Response;

class GeneroResponse
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
     * @var App\Types\Catalogos\Custom\Genero[]
     */
    public $data;

    public function __construct($code, $message = '', $data = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = $data;
    }
}
