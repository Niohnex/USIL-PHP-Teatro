<?php
session_start();
require_once 'Persistence.php';
$ds = Persistence::getInstancia();

$mensaje = "";
if (isset($_POST["email"]) && isset($_POST["contrasena"])) {
    $consulta = "SELECT * FROM usuario WHERE correo = '" . $_POST["email"] . "' AND contrasena = '" . $_POST["contrasena"] . "'";

    $result = $ds->ejecutarConsulta($consulta);

    if (count($result) == 0)
        $mensaje = '* error de email y/o contraseña';
    else {

        $consulta = "SELECT * FROM usuario WHERE correo='" . $_POST["email"] . "' AND tipo = 1"; //el registro del usuario admin tiene que tener tipo 1 en la bd

        $result2 = $ds->ejecutarConsulta($consulta);
        if (count($result2) > 0) {

            $_SESSION["admin"] = $result[0]["correo"];
            header("location:AdministrarUsuarios.php");
        } else {
            $_SESSION["usuario"] = $result[0]["correo"];
            header("location:MiPerfil.php");
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Teatro</title>

    </head>
    <body>
        <div>
            <a href="Login.php"><i>Log In</i></a> |
            <a href="Registrarse.php"><i>Registrarse</i></a>
            
        </div>
        <div >
            <center>
                <div style="height: 400px">       

                    <fieldset style="width: 500px; height: 350px ">
                        <legend> <h1>Log In</h1></legend>
                        <br/>   

                        <form  method="post" action="Login.php">
                            <table border="0" width="370px">
                                <tr>
                                    <td>
                                        <h2> Email: </h2>
                                    </td>
                                    <td width="30px"></td>
                                    <td>
                                        <input type="text" name="email" id="email" style="height: 20px; width: 200px; font-size: 17px"  />
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h2> Contraseña: </h2>
                                    </td>
                                    <td width="30px"></td>
                                    <td>
                                        <input type="password" name="contrasena" id="contrasena" style="height: 20px; width: 200px; font-size: 17px"  />
                                    </td>
                                </tr>

                            </table>
                            <table width="380px" border="0">  
                                <tr>
                                    <td colspan="3">
                                        <div style="text-align: right;">
                                            <input type="submit" value="Ingresar"  class="boton"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="200px" >
                                        <br/>

                                        <div style="height: 50px">
                                            <p style="color: red;">  <?php if (isset($mensaje))
    echo $mensaje; ?>   </p> 
                                        </div>

                                    </td>
                                    <td width="20px">
                                        
                                    </td>
                                    <td>
                                        <a href="RecuperarContrasena.php">Recuperar Contrase&ntilde;a</a>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </fieldset>
                </div> 


            </center>

        </div>
    </body>
</html>