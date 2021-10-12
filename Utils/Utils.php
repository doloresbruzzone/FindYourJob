<?php

namespace Utils;

class Utils{

    public static function checkSession ()
    {
        if (!isset($_SESSION ['alumno']))
        {
            header ("location:". FRONT_ROOT);
        }
    }
}

?>