<?php
require_once("../ds/SQL.php");
require_once("../interface/IManejadorBaseDeDatos.php");
class Misql implements IManejadorBaseDeDatos{
    /*const USUARIO = 'root';
    const CLAVE = '';
    const SERVIDOR = 'localhost';
    const BASE = 'teatro_usil';*/
	const USUARIO = '504116';
    const CLAVE = 'pitagoras';
    const SERVIDOR = 'localhost';
    const BASE = '504116db2';

    private $_conexion;

    public function conectar(){
        $this->_conexion = mysql_connect(self::SERVIDOR, self::USUARIO,self::CLAVE);
        mysql_select_db(self::BASE,$this->_conexion);
    }

    public function desconectar(){
        mysql_close($this->_conexion);

    }

    public function ejecutarQuery(SQL $sql) {
        
        //echo $sql;
        $resultado = mysql_query($sql,$this->_conexion);
        //var_dump($resultado);
        //var_dump($resultado);
        //print_r($resultado);
        if($sql->get_type()==1 && mysql_num_rows($resultado)>0)//es select y hay datos
        {
            $todo=array();//var_dump($resultado);
            while($fila = mysql_fetch_assoc($resultado))
            {
                 $todo[] = $fila;
            }
            return $todo;
            
        }  
        
        
    }


}
