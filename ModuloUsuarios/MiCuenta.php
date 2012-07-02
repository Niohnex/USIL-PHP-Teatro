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
                        <legend> <h1>Editar Perfil</h1></legend>
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
                                            <input type="text" value="<?php echo $usuario["nombres"] ?>" name="nombres" id="nombres"  style="height: 20px; width: 200px; font-size: 17px"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Apellidos: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="text" value="<?php echo $usuario["apellidos"] ?>" id="apellidos" name="apellidos" style="height: 20px; width: 200px; font-size: 17px"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Género: </h2>
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
                                                        <input type="radio" <?php if ($usuario["sexo"] == 1) { ?> checked="true" <?php } ?>  id="sexo" name="sexo" style="height: 20px;" value="1"  />
                                                    </td>
                                                    <td with="20px">

                                                    </td>
                                                    <td>
                                                        <font style="height: 20px; width: 50px; font-size: 17px">  Mujer</font>
                                                    </td>
                                                    <td with="5px">

                                                    </td>
                                                    <td valign="bottom">
                                                        <input type="radio" <?php if ($usuario["sexo"] == 0) { ?> checked="true" <?php } ?> id="sexo" name="sexo" style="height: 20px;" value="0" /> 
                                                    </td>
                                                    <td>

                                                    </td>

                                                </tr>
                                            </table> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Email: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input value="<?php echo $usuario["correo"] ?>" type="text" onfocus="" onBlur="" readonly="readonly" name="email" id="email" style="height: 20px; width: 200px; font-size: 17px"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2> Password: </h2>
                                        </td>
                                        <td width="30px"></td>
                                        <td>
                                            <input type="password" value="" name="contrasena" id="contrasena" style="height: 20px; width: 200px; font-size: 17px"  />
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
                                        <td colspan="3">
                                            <div style="height: 10px">

                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div style="text-align: right;">
                                                <input type="submit" id="enviarDatos" name="enviarDatos" value="Actualizar"  class="boton"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <br/>

                                            <div style="height: 20px">

                                                <p style="color: red"><?php if (isset($mensaje))
    echo $mensaje; ?></p>

                                            </div>

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