<?php
session_start();

require_once 'Persistence.php';
$ds = Persistence::getInstancia();

if (!isset($_SESSION["usuario"]))
    header("location:index.php");
$mensaje = "";



if (isset($_POST["nombres"])) {


    if ($_POST["nombres"] != "" && $_POST["apellidos"] != "" && $_POST["email"] != "" &&
            $_POST["sexo"] != "" && $_POST["contrasena"] != "" && $_POST["contrasena2"] != "") {



        $consulta = "UPDATE usuario SET nombres='" . $_POST["nombres"] . "', apellidos = '" . $_POST["apellidos"] . "',
                            sexo= " . $_POST["sexo"] . ", contrasena='" . $_POST["contrasena"] . "' WHERE correo = '" . $_POST["email"] . "'";

        $ds->ejecutarConsulta($consulta);
        $mensaje = "Sus datos fueron actualizados con éxito";
    }
    else $mensaje ="* se deben completar todos los datos para actualizar";
}
$consulta = "SELECT * FROM usuario WHERE correo='" . $_SESSION["usuario"] . "'";
$result = $ds->ejecutarConsulta($consulta);
$usuario = $result[0];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Teatro</title>


    </head>
    <body>
        <div style="float: left;">
            <a href="MiPerfil.php"><i>Mi Perfil</i></a> |
            <a href="MiCuenta.php"><i>Editar Perfil</i></a> |
            <a href="Logout.php"><i>Log Out</i></a>
           
        </div>
        <div id="login" style="text-align: right" >
            <?php if(isset ($_SESSION["usuario"])){ ?>
            
            Beienvenido(a) <b> <?php echo $_SESSION["usuario"];  ?> </b><br/>
            
            
            <?php }    ?>
        </div>
        <div >
            <center>
                <div >    
                    <fieldset id="fieldset1"  style="width: 500px; height:590px" >
                        <legend> <h1>Mi Perfil</h1></legend>
                        <br/>   
                        <div style="padding-left: 20px">
                            <form  id="myform" name="myform" method="post" action="MiCuenta.php">

                                <table width="370px">

                                    <tr>
                                        <td>
                                            <h2> <label for="nombres">Nombres:</label> </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                       <p style="font-size: 15pt">     <?php echo $usuario["nombres"] ?>     </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Apellidos: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                        <p style="font-size: 15pt">    <?php echo $usuario["apellidos"] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Género: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                        <p style="font-size: 15pt">     <?php if ($usuario["sexo"] == 1)  echo "Hombre"; else echo "Mujer";    ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Email: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <p style="font-size: 15pt">  <?php echo $usuario["correo"] ?></p>
                                        </td>
                                    </tr>
                                   



                                    
                                </table>

                            </form>

                        </div>
                    </fieldset>
                </div>
            </center>
        </div>
        
    </body>
</html>