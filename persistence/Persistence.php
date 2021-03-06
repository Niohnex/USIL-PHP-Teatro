<?php
require_once("../ds/BaseDeDatos.php");
require_once("../dm/Misql.php");
abstract class Persistence {
    public static function _conectarBD(){
        $cn = new BaseDeDatos(new Misql());
        return $cn;
    }

    public static function consultar(SQL $sql){
        $db=Persistence::_conectarBD();
        $respuesta = $db->ejecutar($sql);
        if($sql->get_type()==1 && $respuesta!=null)//select
        {
            return $respuesta;
        }
        
    }
}