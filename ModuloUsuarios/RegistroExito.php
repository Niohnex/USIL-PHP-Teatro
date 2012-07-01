<?php
session_start();

if (!isset($_SESSION["registro"]))
    header("location:index.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Todos Ganan</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script >
            
            function contador_func(i) {
                j=i+1;
                setTimeout("contador_func("+j+")",1400);
                if(j==6) location.href="MiCuenta.php";
            }
        </script>
    </head>
    <body onload="contador_func(1)">
        <div >  
            <div id="content2" style="padding: 45px 45px 10px;">

                <div style="height: 200px">       
                    <p> Enhorabuena <b><?php echo $_SESSION["registro"]; ?></b>. Su registro se realizó con éxito. </p>
                    <p> Espera unos segundos para redireccionarte a tu cuenta o dale a <a href="MiCuenta.php">este link</a>. </p>
                    <?php $_SESSION["registro"] = null; ?>
                </div> 
            </div>         
        </div>
    </body>
</html>