<?php
require_once("../persistence/Persistence.php");

class Usuario {
    
    private $_idUsuarios;
    private $_nombre;
    private $_apellido1;
    private $_apellido2;
    private $_usuario;
    private $_clave;
    private $_estado;
    private $_correo;
    private $_rolId;
    
    
    function __construct($_idUsuarios="", $_nombre="", $_apellido1="", $_apellido2="", $_usuario="", $_clave="", $_estado="", $_correo="", $_rolId="") {
        $this->_idUsuarios = $_idUsuarios;
        $this->_nombre = $_nombre;
        $this->_apellido1 = $_apellido1;
        $this->_apellido2 = $_apellido2;
        $this->_usuario = $_usuario;
        $this->_clave = $_clave;
        $this->_estado = $_estado;
        $this->_correo = $_correo;
        $this->_rolId = $_rolId;
    }
    public function get_idUsuarios() {
        return $this->_idUsuarios;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_apellido1() {
        return $this->_apellido1;
    }

    public function get_apellido2() {
        return $this->_apellido2;
    }

    public function get_usuario() {
        return $this->_usuario;
    }

    public function get_clave() {
        return $this->_clave;
    }

    public function get_estado() {
        return $this->_estado;
    }

    public function get_correo() {
        return $this->_correo;
    }

    public function get_rolId() {
        return $this->_rolId;
    }

    public function set_idUsuarios($_idUsuarios) {
        $this->_idUsuarios = $_idUsuarios;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_apellido1($_apellido1) {
        $this->_apellido1 = $_apellido1;
    }

    public function set_apellido2($_apellido2) {
        $this->_apellido2 = $_apellido2;
    }

    public function set_usuario($_usuario) {
        $this->_usuario = $_usuario;
    }

    public function set_clave($_clave) {
        $this->_clave = $_clave;
    }

    public function set_estado($_estado) {
        $this->_estado = $_estado;
    }

    public function set_correo($_correo) {
        $this->_correo = $_correo;
    }

    public function set_rolId($_rolId) {
        $this->_rolId = $_rolId;
    }

    
    function getUsers(){
        
        $sql= new SQL("select * from usuarios",1);
        $resultado=Persistence::consultar($sql);
        
        
        $users = array();
        foreach($resultado as $usr){
           
            //print_r($usr);
            $_idUsuarios = $usr['idUsuarios'];
            $_nombre=$usr['nombre'];
            $_apellido1=$usr['apellido1'];
            $_apellido2=$usr['apellido2'];
            $_usuario=$usr['usuario'];
            $_clave = $usr['clave'];
            $_estado=$usr['estado'];
            $_correo=$usr['correo'];
            $_rolId=$usr['Roles_idRoles'];
            
           
            $user = new Usuario($_idUsuarios, $_nombre, $_apellido1, $_apellido2, $_usuario, $_clave, $_estado, $_correo, $_rolId);
            
            //print_r($user);
            $users[] = $user;
        }
        return $users;    
    }
}

?>
