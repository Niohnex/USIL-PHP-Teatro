<?php
session_start();
require_once 'Persistence.php';
$ds = Persistence::getInstancia();

$mensaje = "";


if (isset($_POST["nombres"])) {
    if ($_POST["nombres"] != "" && $_POST["apellidos"] != "" && $_POST["email"] != "" &&
            $_POST["sexo"] != "" && $_POST["contrasena"] != "" && $_POST["contrasena2"] != "") {
        
        $mensaje = "";
        if ($_POST["contrasena"] != $_POST["contrasena2"])
            $mensaje = "* debe confirmar correctamente las contraseñas.";
        else {
            $consulta = "SELECT * FROM usuario WHERE correo='" . $_POST["email"] . "'";
            $result = $ds->ejecutarConsulta($consulta);

            if (count($result) > 0) {
                $mensaje = "* el correo ingresado ya se encuentra registrado.";
            } else {
                
              

                $consulta = "INSERT INTO usuario(nombres,apellidos,correo,sexo,contrasena)
                    VALUES ('" . $_POST["nombres"] . "','" . $_POST["apellidos"] . "','" .
                        $_POST["email"] . "'," . $_POST["sexo"] . ",'" .
                        $_POST["contrasena"] . "')";
                
                $ds->ejecutarConsulta($consulta);
               
                $_SESSION["registro"] = $_POST["nombres"] . " " . $_POST["apellidos"];
                $_SESSION["usuario"] = $_POST["email"];
                header("location:RegistroExito.php");
            }
        }
    }
    else
        $mensaje = "* debe completar todos los datos para registrarse.";
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
        <div>
            <center>
                <div >    
                    <fieldset id="fieldset1"  style="width: 500px; height:590px" >
                        <legend> <h1>Registrarse</h1></legend>
                        <br/>   
                        <div style="padding-left: 20px">
                            <form  id="myform" name="myform" method="post" action="Registrarse.php">

                                <table width="370px" border="0">

                                    <tr>
                                        <td>
                                            <h2> <label for="nombres">Nombres:</label> </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="text"  name="nombres" id="nombres"  style="height: 20px; width: 200px; font-size: 17px"  />

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                             <h2>Apellidos:  </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="text" id="apellidos" name="apellidos" style="height: 20px; width: 200px; font-size: 17px"  />

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                             <h2> Género:  </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <font style="height: 20px; width: 50px; font-size: 17px"> Hombre </font>
                                                    </td>
                                                    <td with="5px">

                                                    </td>
                                                    <td valign="bottom">
                                                        <input type="radio" checked="true" id="sexo" name="sexo" style="height: 20px;" value="1"  />
                                                    </td>
                                                    <td with="20px">

                                                    </td>
                                                    <td>
                                                        <font style="height: 20px; width: 50px; font-size: 17px">  Mujer</font>
                                                    </td>
                                                    <td with="5px">

                                                    </td>
                                                    <td valign="bottom">
                                                        <input type="radio" id="sexo" name="sexo" style="height: 20px;"  value="0" /> 
                                                    </td>
                                                    <td>

                                                    </td>

                                                </tr>
                                            </table> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                             <h2> Email:  </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="text" onfocus="foco(1);" onBlur="no_foco(1);" name="email" id="email" style="height: 20px; width: 200px; font-size: 17px"  />

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                             <h2> Password:  </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="password" name="contrasena" id="contrasena" style="height: 20px; width: 200px; font-size: 17px"  />

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                             <h2> Confirmar Password: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="password" name="contrasena2" id="contrasena2" style="height: 20px; width: 200px; font-size: 17px"  />

                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="2">

                                        </td>
                                        <td >
                                            <div style="text-align: left;">
                                                <input type="submit" id="enviarDatos" name="enviarDatos" value="Guardar" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">

                                            <p style="color: red"><?php if(isset($mensaje)) echo $mensaje; ?></p>



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