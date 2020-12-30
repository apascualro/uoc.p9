<?php

class SesionesController{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}

if (isset($_GET["operacion"]) && $_GET["operacion"]=="cerrarSesion"){
    $objecteSessio = new SesionesController();
    session_destroy();
    session_unset();
    header("location: ../vistas/index.php");
}



?>