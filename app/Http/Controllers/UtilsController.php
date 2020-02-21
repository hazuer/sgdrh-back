<?php

namespace App\Http\Controllers;

class UtilsController
{
    /**
     * Valida si la variable es vacía, null o cero
     *
     * @param $value
     * @param bool $zero_is_valid
     * @return bool
     */
    public static function isEmpty($value, $zero_is_valid = false){
        return empty(strlen(trim($value))) || ($value == 0 && $value == null && !$zero_is_valid);
    }

}
