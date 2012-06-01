<?php
///require_once '../control/Controlador.php';
//require_once '../control/UserLogic.php';
//require_once '../persistence/Persistence.php';

/*
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
 * */
 
class ViewPHP {

    public static function run()
    {

        //$miLogic=new Controlador();
        
        $view=isset($_GET['view'])?($_GET['view']):'default';
        
        switch($view)
        {
            case 'default':
               
                require_once 'login.php';
                

                break;
           

            default:
                    break;

        }
        //require_once 'generalView.html';


    }
}
ViewPHP::run();
?>
