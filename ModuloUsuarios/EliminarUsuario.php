<?php
session_start();
require_once 'Persistence.php';
$ds = Persistence::getInstancia();
if(!isset ($_GET["id"]) || !isset ($_SESSION["admin"]))    
    header("location: index.php");
$consulta = "DELETE FROM Usuario WHERE id = ".$_GET["id"];  
$ds->ejecutarConsulta($consulta);
header("location: AdministrarUsuarios.php");
?>
