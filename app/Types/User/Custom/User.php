<?php

namespace App\Types\User\Custom;

class User
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $perfil;

    public function __construct($row)
    {
        $this->id     = $row->id ?? 0;
        $this->name   = $row->name ?? '';
        $this->email  = $row->email ?? '';
        $this->perfil = $row->CatPerfil->perfil ?? '';
    }
}
