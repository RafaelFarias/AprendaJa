<?php

class Helper
{

    static function valid($post)
    {
        $valid = true;

        foreach ($post as $valor) {
            if ($valor == '') {
                $valid = false;
            }
        }

        return $valid;
    }
}
