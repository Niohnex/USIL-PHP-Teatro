<?php

session_start();

class Controlador
{
   
   
    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        header('location:../index.php');

    }
    
 
}


?>
