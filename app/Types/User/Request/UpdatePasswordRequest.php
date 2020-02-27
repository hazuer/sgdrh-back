<?php

namespace App\Types\User\Request;

class UpdatePasswordRequest
{
    /**
     * @var string
     */
    public $name_user;

    /**
     * @var string
     */
    public $pass_actual;

    /**
     * @var string
     */
    public $new_pass;

    /**
     * @var string
     */
    public $new_pass_conf;

}
