<?php
require_once("../persistence/Persistence.php");
require_once("../ds/SQL.php");

class Votacion {
   
    
    private $_usuariosId;
    private $_obrasId;
    private $_userName;
    private $_obraTitulo;
    private $_fecha;
    private $_comentario;
    
    public function get_usuariosId() {
        return $this->_usuariosId;
    }

    public function get_obrasId() {
        return $this->_obrasId;
    }

    public function get_userName() {
        return $this->_userName;
    }

    public function get_obraTitulo() {
        return $this->_obraTitulo;
    }

    public function get_fecha() {
        return $this->_fecha;
    }

    public function get_comentario() {
        return $this->_comentario;
    }
    public function set_usuariosId($_usuariosId) {
        $this->_usuariosId = $_usuariosId;
    }

    public function set_obrasId($_obrasId) {
        $this->_obrasId = $_obrasId;
    }

    public function set_userName($_userName) {
        $this->_userName = $_userName;
    }

    public function set_obraTitulo($_obraTitulo) {
        $this->_obraTitulo = $_obraTitulo;
    }

    public function set_fecha($_fecha) {
        $this->_fecha = $_fecha;
    }

    public function set_comentario($_comentario) {
        $this->_comentario = $_comentario;
    }

        function __construct($_usuariosId="", $_obrasId="", $_userName="", $_obraTitulo="", $_fecha="", $_comentario="") {
        $this->_usuariosId = $_usuariosId;
        $this->_obrasId = $_obrasId;
        $this->_userName = $_userName;
        $this->_obraTitulo = $_obraTitulo;
        $this->_fecha = $_fecha;
        $this->_comentario = $_comentario;
    }
    public function getTodasVotaciones()
    {
        
        $sql= new SQL("select v.Usuarios_idUsuarios idUsuario,o.idObras idObra,u.usuario usuario,o.titulo,v.fecha,v.comentario from votaciones v,obras o, usuarios u where u.idUsuarios=v.Usuarios_idUsuarios and v.Obras_idObras=o.idObras",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_usuariosId=$value['idUsuario'];
            $_obrasId=$value['idObra'];
            $_userName=$value['usuario'];
            $_obraTitulo=$value['titulo'];
            
            $_fecha=$value['fecha'];
            $_comentario=$value['comentario'];
            $objetos[]=new Votacion($_usuariosId, $_obrasId, $_userName, $_obraTitulo, $_fecha, $_comentario);
            
        }
        return $objetos;
    }
     public function getTodasVotacionesByObraId($obraId)
    {
        
        $sql= new SQL("select v.Usuarios_idUsuarios idUsuario,o.idObras idObra,u.usuario usuario,o.titulo,v.fecha,v.comentario from votaciones v,obras o, usuarios u where u.idUsuarios=v.Usuarios_idUsuarios and v.Obras_idObras=o.idObras and o.idObras=$obraId",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_usuariosId=$value['idUsuario'];
            $_obrasId=$value['idObra'];
            $_userName=$value['usuario'];
            $_obraTitulo=$value['titulo'];
            
            $_fecha=$value['fecha'];
            $_comentario=$value['comentario'];
            $objetos[]=new Votacion($_usuariosId, $_obrasId, $_userName, $_obraTitulo, $_fecha, $_comentario);
            
        }
        return $objetos;
    }
    
    public function verificarSiYaVoto($userId,$obraId)
    {
        $sql= new SQL("select comentario,fecha from votaciones where Usuarios_idUsuarios=$userId and Obras_idObras=$obraId",1);
        $resultado=Persistence::consultar($sql);
        //print_r($resultado);
        
        if(count($resultado)==0)
        
            return false;
         
        else
            return true;
    }
    public function conseguirVotoPorUsuarioYObra($userId,$obraId)
    {
        $sql=new SQL("select v.Usuarios_idUsuarios idUsuario,o.idObras idObra,u.usuario usuario,o.titulo,v.fecha,v.comentario from votaciones v,obras o, usuarios u where u.idUsuarios=$userId and  o.idObras=$obraId and  u.idUsuarios=v.Usuarios_idUsuarios and v.Obras_idObras=o.idObras",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_usuariosId=$value['idUsuario'];
            $_obrasId=$value['idObra'];
            $_userName=$value['usuario'];
            $_obraTitulo=$value['titulo'];
            
            $_fecha=$value['fecha'];
            $_comentario=$value['comentario'];
            $objetos[]=new Votacion($_usuariosId, $_obrasId, $_userName, $_obraTitulo, $_fecha, $_comentario);
            
        }
        return $objetos[0];
    }
    public function comentar($obraId,$usuarioId,$comentario)
    {
        $fecha=date("Y-m-d");
        $sql=new SQL("insert into votaciones (Usuarios_idUsuarios,Obras_idObras,comentario,fecha) values ($usuarioId,$obraId,  '$comentario','$fecha')",1);
        $resultado=Persistence::consultar($sql);
    }
    
   
    
}

?>
