<?php

namespace App\Modulos;

class Controller
{
    public function json($value)
    {
        if ($value === "") {
            return;
        }
        echo json_encode($value,  JSON_UNESCAPED_UNICODE);
        exit();
    }
}
