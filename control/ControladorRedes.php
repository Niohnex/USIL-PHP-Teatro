<?php
require_once("../model/Obra.php");
require_once("../model/Usuario.php");
require_once("../model/Votacion.php");
require_once("../model/Participante.php");
require("../twitter/twitteroauth.php");
//require 'config/twconfig.php';
session_start();
define('YOUR_CONSUMER_KEY', 'ts8a9qaWEEyHGI3qk10sHg');
define('YOUR_CONSUMER_SECRET', 'LpXe2FcCVessRxKU8pt9lhsKoMZJ9HJXxyISF4o');


define('APP_ID', '214887698634315');
define('APP_SECRET', 'fa80c2f22407b068dd72e4f540b93435');

class ControladorRedes
{

	public function conectarFacebook()
	{
	
	//echo 'entrando al controlador facebook';
	require '../facebook/facebook.php';

require '../config/functions.php';

$facebook = new Facebook(array(
            'appId' => APP_ID,
            'secret' => APP_SECRET,
            'cookie' => true
        ));

$session = $facebook->getSession();

if (!empty($session)) {
    # Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
    try {
	
	//echo 'estableciendo conexion';
        $uid = $facebook->getUser();
        $user = $facebook->api('/me');
    } catch (Exception $e) {




    }
//print_r($user);
//echo "usuario fue";
    if (!empty($user)) {
        # User info ok? Let's print it (Here we will be adding the login and registering routines)
       // echo '<pre>';
        //print_r($user);
		//echo 'leyo usuario facebook';
        //echo '</pre><br/>';
        $username = $user['name'];
		//$uid=$user['id'];
        $user = new User();
		$usuarioF=new Usuario();
		//echo "$uid uid es y $username es username";
        $userdata = $user->checkUser2($uid, 'facebook', $username);
		//print_r($userdata);
		//$usuario->set_usuario($userdata['usuario']);
        if(!empty($userdata)){
            session_start();
           // $_SESSION['id'] = $userdata['id'];
 //$_SESSION['oauth_id'] = $uid;

   //         $_SESSION['username'] = $userdata['username'];
     //       $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
	 $usuarioF->set_usuario($userdata['usuario']);
	 $usuarioF->set_idUsuarios($userdata['idUsuarios']);
	 $_SESSION['usuario']=$usuarioF;
           // header("Location:../view/index.php?vista=tengoUsuario2");
        }
    } else {
        # For testing purposes, if there was an error, let's kill the script
        die("There was an error.");
    }
} else {
    # There's no active session, let's generate one
    $login_url = $facebook->getLoginUrl();
    header("Location: " . $login_url);
	//header("Location:../view/index.php?vista=tengoUsuario3");
	
}
	
	
	}


	public function loginTwitter()
	{
	
		
//require("../twitter/twitteroauth.php");
//require 'config/twconfig.php';
require '../config/functions.php';


if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
    // We've got everything we need
    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
// Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
    $_SESSION['access_token'] = $access_token;
// Let's get the user's info
    $user_info = $twitteroauth->get('account/verify_credentials');
// Print user's info
    //echo '<pre>';
    //print_r($user_info);
   // echo '</pre><br/>';
    if (isset($user_info->error)) {
		
        // Something's wrong, go back to square 1  
       // header('Location:view/index.php?vista=loginSocial&oauth_provider=twitter');
		//header("Location:../view/index.php?error=twitter");
		
    } else {
        $uid = $user_info->id;
        $username = $user_info->name;
        $user = new User();
		$usuario=new Usuario();
        $userdata = $user->checkUser2($uid, 'twitter', $username);
        if(!empty($userdata)){
            session_start();
            //$_SESSION['id'] = $userdata['id'];
 //$_SESSION['oauth_id'] = $uid;
            //$_SESSION['username'] = $userdata['username'];
          //  $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
			$usuario->set_usuario($userdata['usuario']);
			$usuario->set_idUsuarios($userdata['idUsuarios']);
			$_SESSION['usuario']=$usuario;
			
            //header("Location:.../view/index.php");
        }
    }
} else {
    // Something's missing, go back to square 1
    //header('Location: login-twitter.php');
	//header("Location:../view/index.php?error=fatal");
}
	
	}

   public function conectarTwitter()
   {
   
	


$twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET);
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://musicpoly.freevar.com/teatro_usi_propuesto/view/index.php?vista=loginTwitter');

// Saving them into the session

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

// If everything goes well..
if ($twitteroauth->http_code == 200) {
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: ' . $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}
   }
   
   
   }