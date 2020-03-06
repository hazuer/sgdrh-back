<?php

namespace App\Types\Documento\Request;

class AltaDocumentoRequest
{
    /**
     * @var integer
     */
    public $id_expediente;

    /**
     * @var integer
     */
    public $id_cat_doc;

    /**
     * @var string
     */
    public $file_name;

    /**
     * @var integer
     */
    public $file_size;

    /**
     * @var string
     */
    public $file_mime_type;

    /**
     * @var string
     */
    public $file_binary_b64;

}
