<?php
//session_start();
require_once("../model/Usuario.php");
class UserLogic{
    
   function ingresarUsuarioManualmente($_nombre,$_apellido1,$_apellido2,$_usuario,$_clave,$_estado,$_correo,$_rolId)
    {
        
            $user= new Usuario();
           
            
            
            $usuario= new Usuario($this->getNuevoUserId(), $_nombre, $_apellido1, $_apellido2, $_usuario, md5($_clave), $_estado, $_correo, $_rolId);
            $usuarioNuevoId=$usuario->insertUsuario();
            return $user->getUsuarioPorId($usuarioNuevoId);
            
    }
    
   
    function getNuevoUserId()
    {
         $user= new Usuario();
          $ids=$user->getUsuariosId();
         $nuevoIdUsuario=rand(1, 20000);
        if (in_array($nuevoIdUsuario,$ids))
            return $this->getNuevoUserId ();
        else
            return $nuevoIdUsuario;
        
    }
  
    
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
