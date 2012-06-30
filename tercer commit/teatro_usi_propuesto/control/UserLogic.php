<?php
//session_start();
require_once("../model/Usuario.php");
class UserLogic{
    
  
    
    function auth($r_username,$r_pwd){
        $usr = new Usuario();
        $users = $usr->getUsers();
        foreach($users as $user){
            //print_r($user);
            $username = $user->get_usuario();
            //echo $username;
            $pwd = $user->get_clave();
            //echo $pwd;
            if($r_username == $username && md5($r_pwd) == $pwd)
                return $user;
        }
        return false;
    }
    
    function logout()
    {
        unset($_SESSION['usuario']);
        
    }
}
