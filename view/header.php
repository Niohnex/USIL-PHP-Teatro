<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="all,follow" />
    <meta name="author" lang="en" content="All: ... [www.url.com]; e-mail: info@url.com" />
    
    <meta name="description" content="..." />
    <meta name="keywords" content="Teatro, USIL, Obras, temporada 2012" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="../css/main.css" />
    <!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="../css/estilosDiferencia.css" />
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery.innerfade.js"></script>
        
         
    <script type="text/javascript">
        
        
    $(document).ready(
    function(){
        $('#slider').innerfade({
            animationtype: 'fade',
            speed: 750,
            timeout: 3000,
            type: 'sequence',
            containerheight: 'auto'
        });
    });
    </script>
    <title>Teatro Usil</title>
</head>

<body>

<div id="main">

    <!-- Header -->
    <div id="header" class="box">

        <p id="logo"><a href="#" title="Teatro Usil[Go to homepage]"><img src="../design/logo.gif" alt="Logo" /></a></p>

        <hr class="noscreen" />

        <!-- Navigation -->
        <p id="nav">
           <a href="index.php"> <strong>Home</strong></a> <span>|</span>
            <a href="#">Sobre nosotros</a> <span>|</span>
            <!--<a href="index.php">Obras</a> <span>|</span>-->
            <a href="#">Cont&aacute;ctenos</a>
            
            
            <?php if (!isset($_SESSION['usuario'])) { ?>
            <a class="i-auth" title="Registrarse" href="index.php?vista=registrar">Registrarse</a>
            <a class="i-auth" title="Registrarse con Facebook" href="index.php?vista=loginSocial&oauth_provider=facebook"><img height="16" width="16" alt="Facebook" src="../design/facebook-16.gif"></a>
			
			<!--<a href="index.php?vista=loginSocial&oauth_provider=facebook">Face</a>-->
            <a class="i-auth" title="Registrarse con Twitter" href="index.php?vista=loginSocial&oauth_provider=twitter"><img height="16" width="16" alt="Twitter" src="../design/twitter-16.gif"></a>
			<!--<a href="index.php?vista=loginSocial&oauth_provider=twitter">Twitt</a>-->
            <a class="i-auth" title="Loggearse manualmente" href="index.php?vista=login2"><img height="16" width="16" alt="Facebook" src="../design/manual-16.gif"></a>
            <?php } ?>
            
            
           
            
             
            <?php if (isset($_SESSION['usuario'])) {  echo "Usuario:".$_SESSION['usuario']->get_usuario();}  ?>
				
                <a class="i-auth" title="Logout" href="index.php?vista=logout">Logout</a>
             </a>
            
            
            
            
            
        </p>
         <p id="nav2">
            <strong>Home</strong> <span>|</span>
            <a href="#">Sobre nosotros</a> <span>|</span>
            <a href="#">Obras</a> <span>|</span>
            <a href="#">Cont&aacute;ctenos</a>
        </p>
        <p id="">
            
            <a href="#">Facebook</a> <span>|</span>
            <a href="#">Twitter</a> <span>|</span>
            <a href="index.php?vista=login2">Registro manual</a>
        </p>
        

    </div> <!-- /header -->

    <hr class="noscreen" />

   

    

  