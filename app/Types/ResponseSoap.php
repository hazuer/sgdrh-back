<?php

namespace App\Types;

class ResponseSoap
{
    /**
     * @var integer
     */
    public $code;

    /**
     * @var string
     */
    public $message;

    public function __construct($code, $message = '')
    {
        $this->code    = $code;
        $this->message = $message;
    }
}
