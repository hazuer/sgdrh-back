<?php

namespace App\Types\Catalogo\Response;

class DocumentoResponse
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
     * @var App\Types\Catalogo\Custom\Documento[]
     */
    public $data;

    public function __construct($code, $message = '', $data = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = $data;
    }
}
