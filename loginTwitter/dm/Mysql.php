<?php
require_once '../ds/SQL.php';
require_once '../interface/IManejadorBaseDeDatos.php';
class MySQL implements IManejadorBaseDeDatos{
    const USUARIO = 'root';
    const CLAVE = '';
    const SERVIDOR = 'localhost';
    const BASE = 'teatro-usil';

    private $_conexion;

    public function conectar(){
        $this->_conexion = mysql_connect(self::SERVIDOR, self::USUARIO,self::CLAVE);
        mysql_select_db(self::BASE,$this->_conexion);
    }

    public function desconectar(){
        mysql_close($this->_conexion);

    }

    public function ejecutarQuery(SQL $sql) {
        
       
        $resultado = mysql_query($sql,$this->_conexion);
       
        if($sql->get_type()==1 && mysql_num_rows($resultado)>0)//es select y hay datos
        {
            $todo=array();
            while($fila = mysql_fetch_assoc($resultado))
            {
                 $todo[] = $fila;
            }
            return $todo;
            
        }  
        
        
    }


}
