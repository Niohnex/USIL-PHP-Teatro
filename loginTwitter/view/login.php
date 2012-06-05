<?php
//session_start();	 

include 'lib/EpiCurl.php';
include 'lib/EpiOAuth.php';
include 'lib/EpiTwitter.php';
//include 'lib/secret.php';


$consumer_key='3zTQ6bNqKCQGE337JOHN6w';
$consumer_secret='hTSEiiNxkQx3ag1QUnUUo4id1jdZZ8AqAyfWd7pvA8';

$twitterObj=new EpiTwitter($consumer_key,$consumer_secret);

$error =null;
$href=$twitterObj->getAuthorizationUrl();
$botonLogin="<a href='$href'>Login with Twitter</a>";


$botonLogin3=
"<a   href='$href' class='btn btn-info' > <img src='img/icon-tw.png'>
							Regístrate con Twitter
						</a>";


if(isset($_GET['oauth_token'])||(isset($_SESSION['oauth_token']) && isset($_SESSION['oauth_token_secret'])))
//se accede a info de twitter    
{
    if((!isset($_SESSION['oauth_token']))||!isset($_SESSION['oauth_token_secret']))
    //recien viene de twitter
        {
            $twitterObj->setToken($_GET['oauth_token']);
            $token=$twitterObj->getAccessToken();
            $_SESSION['oauth_token']=$token->oauth_token;
            $_SESSION['oauth_token_secret']=$token->oauth_token_secret;
            
            $twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
        }
        else   //ya dio acceso con anterioridad
        {
            
             $twitterObj->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
        }
        $user=$twitterObj->get_accountVerify_credentials();//devolver datos de twitter en formato xml segun twitter api
        print_r($user);
        $datos="Bienvenido $user->name tienes $user->followers_count seguidores";
}
elseif (isset($_GET['denied']))//no se accedio
{
    $error='debes validarte primero';
    
}
    
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login Teatro Usil</title>
        <link  rel="stylesheet" type="text/css" href="css/bootstrapmin.css" ></link>
    </head>
    <body>
    <h1>Login </h1>
        <?php 

if(isset($_GET['oauth_token'])||(isset($_SESSION['oauth_token'])||isset($_SESSION['oauth_token_secret'])))
    //se tiene acceso
{
    
    echo $datos;
}
else
{
    
    ?>
    <div id="login botones">
        <ul>
            
                                        <li>
                                            <button  type="button" class="btn btn-primary">
                                                    <img src="img/icon-fb.png">
							Reg&iacute;strate con Facebook
						</button>
					</li>
					
                                        <li>
						<?php echo $botonLogin3;?>	
					</li>
					
					<li>
					
					<button id="login-btn" class="btn">
						
						Registro manual
					</button>
					</li>
				</ul>
            
        </div>

<?php


}
//Mostrar error siempre, de no haber no sale nada
echo $error;
?>


    </body>
</html>

