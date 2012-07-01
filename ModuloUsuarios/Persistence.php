<?php
class Persistence {
    private static $_instancia = null;
    private $_cn;
    public static function getInstancia(){

            if(self::$_instancia == null)
                self::$_instancia = new Persistence();
            return self::$_instancia;
    }
   public function __construct() {
           $this->_cn=mysql_connect("localhost", "root");
           $db = mysql_select_db("teatro",$this->_cn);
    }

    public function ejecutarConsulta($sql){

            $rs = mysql_query($sql, $this->_cn);
            if($rs!=1 && $rs!=false){
                $lista = array();
                while($row = mysql_fetch_assoc($rs)){
                    $lista[] = $row;
                }
                mysql_free_result($rs);
                return $lista;
            }
            else return $rs;


       }

}

