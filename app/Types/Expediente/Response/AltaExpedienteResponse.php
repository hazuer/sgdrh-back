<?php

namespace App\Types\Expediente\Response;

class AltaExpedienteResponse
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
     * @var mixed
     */
    public $data;

    public function __construct($code, $message = '', $id_expediente = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = empty($id_expediente) ? null : (object) compact('id_expediente');
    }
}
