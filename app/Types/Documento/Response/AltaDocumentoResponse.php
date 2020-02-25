<?php

namespace App\Types\Documento\Response;

class AltaDocumentoResponse
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

    public function __construct($code, $message = '', $id_exp_doc = null)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->data    = empty($id_exp_doc) ? null : (object) compact('id_exp_doc');
    }
}
