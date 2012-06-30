<?php 
require_once("../control/Controlador.php");
require_once("../control/UserLogic.php");
require_once("../model/Obra.php");
        require_once("../model/Votacion.php");
        require_once("../model/Usuario.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


$controlador= new Controlador();
 $userLogic = new UserLogic();

$vista=isset($_GET['vista'])?$_GET['vista']:'principal';
$obras=$controlador->getTodasObras();

//$comentarios=$controlador->getTodasVotaciones();

switch($vista)
{
    case 'principal':
        
        
        break;
    
    case 'comentar':
        
        $tipoVoto=isset($_POST['votoPositivo'])?1:-1;
        $comentario=$_POST['comentario'];
        $obraId=$_POST['obraId'];
        $usuarioId=$_SESSION['usuario']->get_idUsuarios();
        $logicC=new Controlador();
       $logicC->votarComentar($obraId, $usuarioId, $comentario, $tipoVoto);
        
       // print_r($_POST);
        
         $id=$_POST['obraId'];
         $obra=$controlador->getObraById($id);
         $vista='detalle';
          
       header("location:index.php?vista=detalle&id=$id");
         
        
        break;
    
    case 'logout':
        $control=new UserLogic();
        $vista='principal';
        $control->logout();
        break;
    
    case 'detalle':
        $id=$_GET['id'];
        $obra=$controlador->getObraById($id);
        require_once("../model/Votacion.php");
        require_once("../model/Participante.php");
        
        $actores=$controlador->getArregloActoresByObraId($id);
        
        $director=$controlador->getDirectorByObraId($id);
        
        $horarios=$controlador->getHorariosYSalasByObraId($id);
        
        
        $control=new Controlador();
        $votos=$control->getTodasVotaciones();
        $votos=$control->getTodasVotacionesPorObraId($id);
        
        
        $mostrarFormularioVotos=false;
        $mensajeDeVotacion="";
        if(isset($_SESSION['usuario']))
        {
            //hay usuario
            if($control->voto($_SESSION['usuario']->get_idUsuarios(), $id))
                {//ya voto, no podra votar ya
                    $mensajeDeVotacion="Ud. Ya voto";
                }
             else
             {
                 //mostrar formulario, esta habilitado para votar
                 $mostrarFormularioVotos=true;
                 $mensajeDeVotacion="Llene el formulario para votar";
             }
                
        }
        else
        {
            //no puede votar, no se sabe si ya voto, no se muestra formulario para votar
            $mensajeDeVotacion="Registrese para votar";
        }
        
        
        
        
        break;
    
    
        
        case 'login':
                if(isset($_POST['username']) && isset($_POST['pwd'])){
                    if($_POST['username']!=null && $_POST['pwd']!=null){
                        $r_username =$_POST['username'];
                        $r_pwd = $_POST['pwd'];
                      
                        $rs = $userLogic->auth($r_username,$r_pwd);
                        if($rs==true)
                        {
                            $vista='index';
                            echo 'ok';
                            $_SESSION['usuario']=$rs;
                            $vista='principal';
                        }
                        else
                        {
                            echo 'no ok';
                        }
                        
                    }
                }
                
                break;
                
                
        
    default:
        break;
    
}




require_once("header.php");
require_once $vista.'.php';
require_once("footer.php");


?>