<?php
session_start();
require_once 'Persistence.php';
$ds = Persistence::getInstancia();

$mensaje = "";

if(!isset ($_SESSION["admin"])) header ("location: index.php");
$consulta = "SELECT * FROM Usuario WHERE tipo = 0"; // select de todos los no administradores
$usuarios = $ds->ejecutarConsulta($consulta);
     
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Teatro</title>

    </head>
    <body>
        <div id="login" >
            <?php if(isset ($_SESSION["admin"])){ ?>
            
            Beienvenido(a) <b> <?php echo $_SESSION["admin"];  ?> </b><br/>
            <i> <a href="Logout.php">(log out)</a></i>
            
            <?php }    ?>
        </div>
        <div>
            <center>
                <div >    
                    <fieldset id="fieldset1"  style="width: 580px; height:490px" >
                        <legend> <h1>Administrar Usuarios</h1></legend>
                        <br/>   
                        <div style="padding-left: 20px; overflow: auto; height: 500px;">
                          
                            <table cellpadding="2" cellspacing="2" border="1" width="550px">
                                <tr>
                                    <td>
                                        <b>Código</b>
                                    </td>
                              
                                    <td>
                                        <b>Nombres</b>
                                    </td>
                               
                                    <td>
                                        <b>Apellidos</b>
                                    </td>
                               
                                    <td>
                                        <b>Correo</b>
                                    </td>
                               
                                    <td>
                                        <b>Sexo</b>
                                    </td>
                                    <td>
                                        <b>Acciones</b>
                                    </td>
                                </tr>
                            
                               <?php  foreach ($usuarios as $u) { ?>
                                
                                <tr>
                                    <td>
                                        <?php echo $u["id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $u["nombres"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $u["apellidos"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $u["correo"]; ?>
                                    </td>
                                    <td>
                                        <?php if ( $u["sexo"] ==1 ) echo "Hombre"; else echo "Mujer"; ?>
                                    </td>
                                    <td>
                                        <a href="EliminarUsuario.php?id=<?php echo  $u["id"]; ?>">Eliminar</a>
                                    </td>
                                </tr>
                             
                               <?php }  ?>
                                </table>
                        </div>
                    </fieldset>
                </div>
            </center>
        </div>
    </body>
</html>