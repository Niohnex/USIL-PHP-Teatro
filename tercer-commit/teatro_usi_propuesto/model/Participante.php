<?php
require_once("../persistence/Persistence.php");
require_once("../ds/SQL.php");
require_once("Obra.php");
class Participante{
    
    private $_idParticipantes;
    private $_nombre;
    private $_apellido;
    private $_cargo;
    private $_cargoId;
    
    
   
    
    function __construct($_idParticipantes="", $_nombre="", $_apellido="", $_cargo="", $_cargoId="") {
        $this->_idParticipantes = $_idParticipantes;
        $this->_nombre = $_nombre;
        $this->_apellido = $_apellido;
        $this->_cargo = $_cargo;
        $this->_cargoId = $_cargoId;
    }
    public function set_idParticipantes($_idParticipantes) {
        $this->_idParticipantes = $_idParticipantes;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_apellido($_apellido) {
        $this->_apellido = $_apellido;
    }

    public function set_cargo($_cargo) {
        $this->_cargo = $_cargo;
    }

    public function set_cargoId($_cargoId) {
        $this->_cargoId = $_cargoId;
    }

    public function get_idParticipantes() {
        return $this->_idParticipantes;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_apellido() {
        return $this->_apellido;
    }

    public function get_cargo() {
        return $this->_cargo;
    }

    public function get_cargoId() {
        return $this->_cargoId;
    }
    
    public function get_personaje($actorId)
    {
        $sql= new SQL("select personaje from obras_has_participantes where Participantes_idParticipantes=$actorId",1);
        $resultado=Persistence::consultar($sql);
        
        return $resultado[0]['personaje'];
        
    }
    
    public function getDirectorPorObraId($obraId)
    {
        $obra= new Obra();
        $obra= $obra->getObraById($obraId);
        return $this->getActorById($obra->get_director());
    }
    
    public function getActoresPorObraId($obraId)
    {
        
        $sql= new SQL("select p.idParticipantes,p.nombre,p.apellido,p.cargo,p.Cargos_idCargos from obras_has_participantes r,participantes p where r.Participantes_idParticipantes=p.idParticipantes and r.Obras_idObras=$obraId",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_idParticipantes=$value['idParticipantes'];
            $_nombre=$value['nombre'];
            $_apellido=$value['apellido'];
            $_cargo=$value['cargo'];
            $_cargoId=$value['Cargos_idCargos'];
            
            
            $objetos[]=new Participante($_idParticipantes, $_nombre, $_apellido, $_cargo, $_cargoId);
            
        }
        return $objetos;
    }
    public function getActorById($actorId)
    {
        $sql= new SQL("select * from participantes where idParticipantes=$actorId",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_idParticipantes=$value['idParticipantes'];
            $_nombre=$value['nombre'];
            $_apellido=$value['apellido'];
            $_cargo=$value['cargo'];
            $_cargoId=$value['Cargos_idCargos'];
            
            
            $objetos[]=new Participante($_idParticipantes, $_nombre, $_apellido, $_cargo, $_cargoId);
            
        }
        return $objetos[0];
    }
    public function getArregloPersonajesPorObraId($obraId)
    {
        $actores=$this->getActoresPorObraId($obraId);
        $personajes=array();
        foreach($actores as $actor)
        {
            $personajes[$actor->get_idParticipantes()]=$actor->get_personaje($actor->get_idParticipantes());
            
        }
        return $personajes;
        
    }


}

?>
