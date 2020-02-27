<?php

namespace App\Types\User\Response;

class UserResponse
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
     * @var App\Types\User\Custom\User[]
     */
    public $data;

    public function __construct($code, $message = '', $data = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = $data;
    }
}
