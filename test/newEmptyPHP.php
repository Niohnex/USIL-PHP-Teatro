<?php
require_once '../model/Votacion.php';
require_once '../model/Obra.php';
require_once '../control/Controlador.php';
require_once '../model/Usuario.php';
require_once '../model/Participante.php';

$user= new Usuario();
//print_r($user->getUsers());

$control= new Controlador();
//$votos=$control->getVotaciones();
//print_r($votos);

//print_r($control->getTodosUsuarios());
//session_destroy();


//$control->votarComentar(2,2,'testeando... ', '1');
$parti=new Participante();
$actor=$parti->getActorById(1);
//echo $actor->get_personaje($actor->get_idParticipantes());
//echo $parti->get_personaje(1);

//print_r( $parti->getArregloPersonajesPorObraId(1));
//print_r($parti->getActoresPorObraId(1));
$obra= new Obra();
print_r( $obra->getHorariosYSalas(1));
?>
