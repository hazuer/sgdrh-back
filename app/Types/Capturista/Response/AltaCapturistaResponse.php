<?php

namespace App\Types\Capturista\Response;

class AltaCapturistaResponse
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

    public function __construct($code, $message = '', $id = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = empty($id) ? null : (object) compact('id');
    }
}
