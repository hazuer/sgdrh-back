<?php

namespace App\Types\Catalogos\Response;

class TipoDocumentoResponse
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
     * @var App\Types\Catalogos\Custom\TipoDocumento[]
     */
    public $data;

    public function __construct($code, $message = '', $data = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = $data;
    }
}
