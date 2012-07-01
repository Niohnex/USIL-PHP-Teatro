<?php
require_once("../persistence/Persistence.php");
require_once("../ds/SQL.php");
class Obra{
    
	private $_id;
	private $_titulo;
	private $_resena;
	private $_autor;
	private $_fechaDesde;
	private $_fechaHasta;
	private $_puntaje;
	private $_detallesExtra;
	private $_numeroSitios;
	private $_precio;
	private $_duracion;
	private $_director;
	private $_afiche;

/*
	public function __construct(){
		$this->_id = $_POST['idObras'];
		$this->_titulo = $_POST['titulo'];
		$this->_resena = $_POST['resena'];	
		$this->_autor = $_POST['autor'];
		$this->_fechaDesde = $_POST['fecha_desde'];
		$this->_fechaHasta = $_POST['fecha_hasta'];
		$this->_puntaje = $_POST['puntaje'];
		$this->_detallesExtra = $_POST['detalles_extra'];
		$this->_numeroSitios = $_POST['numeroSitios'];
		$this->_precio = $_POST['precio'];
		$this->_duracion = $_POST['duracion'];
		$this->_director = $_POST['director'];
		$this->_afiche = $_POST['afiche'];
	}
 * 
 * 
 */
        
public function get_id() {
    return $this->_id;
}

public function get_titulo() {
    return $this->_titulo;
}

public function get_resena() {
    return $this->_resena;
}

public function get_autor() {
    return $this->_autor;
}

public function get_fechaDesde() {
    return $this->_fechaDesde;
}

public function get_fechaHasta() {
    return $this->_fechaHasta;
}

public function get_puntaje() {
    return $this->_puntaje;
}

public function get_detallesExtra() {
    return $this->_detallesExtra;
}

public function get_numeroSitios() {
    return $this->_numeroSitios;
}

public function get_precio() {
    return $this->_precio;
}

public function get_duracion() {
    return $this->_duracion;
}

public function get_director() {
    return $this->_director;
}

public function get_afiche() {
    return $this->_afiche;
}


public function set_id($_id) {
    $this->_id = $_id;
}

public function set_titulo($_titulo) {
    $this->_titulo = $_titulo;
}

public function set_resena($_resena) {
    $this->_resena = $_resena;
}

public function set_autor($_autor) {
    $this->_autor = $_autor;
}

public function set_fechaDesde($_fechaDesde) {
    $this->_fechaDesde = $_fechaDesde;
}

public function set_fechaHasta($_fechaHasta) {
    $this->_fechaHasta = $_fechaHasta;
}

public function set_puntaje($_puntaje) {
    $this->_puntaje = $_puntaje;
}

public function set_detallesExtra($_detallesExtra) {
    $this->_detallesExtra = $_detallesExtra;
}

public function set_numeroSitios($_numeroSitios) {
    $this->_numeroSitios = $_numeroSitios;
}

public function set_precio($_precio) {
    $this->_precio = $_precio;
}

public function set_duracion($_duracion) {
    $this->_duracion = $_duracion;
}

public function set_director($_director) {
    $this->_director = $_director;
}

public function set_afiche($_afiche) {
    $this->_afiche = $_afiche;
}

function __construct($_id="", $_titulo="", $_resena="", $_autor="", $_fechaDesde="", $_fechaHasta="", $_puntaje="", $_detallesExtra="", $_numeroSitios="", $_precio="", $_duracion="", $_director="", $_afiche="") {
    $this->_id = $_id;
    $this->_titulo = $_titulo;
    $this->_resena = $_resena;
    $this->_autor = $_autor;
    $this->_fechaDesde = $_fechaDesde;
    $this->_fechaHasta = $_fechaHasta;
    $this->_puntaje = $_puntaje;
    $this->_detallesExtra = $_detallesExtra;
    $this->_numeroSitios = $_numeroSitios;
    $this->_precio = $_precio;
    $this->_duracion = $_duracion;
    $this->_director = $_director;
    $this->_afiche = $_afiche;
}

	/*
	public function _insertObra(){
		$sql = "INSERT INTO 'Obras' ('idObras', 'titulo', 'resena', 'autor', 'fecha_desde', 'fecha_hasta', 'puntaje', 'detalles_extra', 'numeroSitios', " + 
				"'precio', 'duracion', 'director', afiche') VALUES ($this->_id, $this->_titulo, $this->_resena, $this->_autor, $this->_fechaDesde, " + 
				"$this->_fechaHasta, $this->_puntaje, $this->_detallesExtra, $this->_numeroSitios, $this->_precio, $this->_duracion, $this->_director, "
				"$this->_afiche)";
		
		mysql_query($sql) OR die (mysql_error());
		echo "Obra Agregada";
	}
         * 
         * 
         * 
*/	

        public function getClaseDeObra()
        {
             $clase ="";   
             $puntaje=$this->get_puntaje();
             if ($puntaje>=50)
             {
                 if($puntaje>=100)
                 {
                     if($puntaje>=150)
                     {
                         if($puntaje>=200)
                        {
                             $clase='nihyaku';
                        }
                        else
                        {
                            $clase="hyakugojuu";
                        }
                   
                     }
                     else
                     {
                         $clase="hyaku";
                     }
                 }
                 else
                 {
                     $clase='gojuu';
                 }
                 
             }
             else
             {
                 $clase='rei';
             }
             return $clase;
            
        }

	public function _updateObra(){
		$sql = "UPDATE 'Obras' SET titulo = '$this->_titulo', resena = '$this->_resena', autor = '$this->_autor', fecha_desde = '$this->_fechaDesde', " + 
				"fecha_hasta = '$this->_fechaHasta', puntaje = '$this->_puntaje', detalles_extra = '$this->_detallesExtra', numeroSitios = '$this->_numeroSitios', " + 
				"precio = '$this->_precio', duracion = '$this->_duracion', director = '$this->_director', afiche = '$this->_afiche' " + 
				"WHERE idObras = '$this->_id'";
				
		mysql_query($sql) OR die (mysql_error());
		echo "Obra Actualizada";
	}
	
	public function _deleteObra(){
		$sql = "DELETE FROM 'Obras' WHERE idObras = '$this->_id'";
		
		mysql_query($sql) OR die (mysql_error());
		echo "Obra Eliminada";
	}
	
	public function _findObra(){
		$sql = "SELECT * FROM 'Obras'";
		
		mysql_query($sql) OR die (mysql_error());
		while($row = mysql_fetch_array($result)){ 
			$this->_id = $row['idObras'];
			$this->_titulo = $row['titulo'];
			$this->_resena = $row['resena'];	
			$this->_autor = $row['autor'];
			$this->_fechaDesde = $row['fecha_desde'];
			$this->_fechaHasta = $row['fecha_hasta'];
			$this->_puntaje = $row['puntaje'];
			$this->_detallesExtra = $row['detalles_extra'];
			$this->_numeroSitios = $row['numeroSitios'];
			$this->_precio = $row['precio'];
			$this->_duracion = $row['duracion'];
			$this->_director = $row['director'];
			$this->_afiche = $row['afiche'];
		echo 'Obra Id: ' . $this->_id . ' Titulo: ' . $this->_titulo . ' Reseña: ' . $this->_resena . ' Autor: ' . $this->_autor . ' Desde:
				' . $this->_fechaDesde . 'Hasta: ' . $this->_fechaHasta . ' Puntaje: ' . $this->_puntaje . ' Detalles Extra: ' . $this->_detallesExtra . '
				Cantidad de Sitios:	' . $this->_numeroSitios . ' Precio: ' . $this->_precio . ' Duracion: ' . $this->_duracion . ' Director:
				' . $this->_director . ' Afiche: ' . $this->_afiche ."<br/>\n"; 
		}	
	}
        
        public function votar($obraId,$nuevoPuntaje)
        {
            $sql=new SQL("update obras set puntaje=$nuevoPuntaje where idObras=$obraId",2);
            $resultado=Persistence::consultar($sql);
            
        }
        
        public function getTemporada($obraId)
        {
            $sql= new SQL("select t.nombre from temporadas t,temporadas_has_obras doble  where  t.idTemporadas=doble.temporadas_idTemporadas and  doble.obras_idObras=$obraId",1);
        $resultado=Persistence::consultar($sql);
        
        return $resultado[0]['nombre'];
            
        }
        
        public function getHorariosYSalas($obraId)
        {
            $sql= new SQL("select h.horaInicio,h.horaFin,s.nombre sala,o.dia from obras_has_horarios o,salas s,horarios h where o.horarios_idHorarios=h.idHorarios and o.salas_idSalas=s.idSalas and o.obras_idObras=$obraId",1);
        $resultado=Persistence::consultar($sql);
        $i=0;
        foreach($resultado as $key=>$value)
        {
           
            $objetos[]= $resultado[$i++];
        }
        return $objetos;
            
        }
        
        
        public function getTodasObras()
    {
        $sql= new SQL("select * from obras",1);
        $resultado=Persistence::consultar($sql);
        foreach($resultado as $key=>$value)
        {
            $_id=$value['idObras'];
            $_titulo=$value['titulo'];
            $_resena=$value['resena'];
            $_autor=$value['autor'];
            $_fecha_desde=$value['fecha_desde'];
            $_fecha_hasta=$value['fecha_hasta'];
            $_puntaje=$value['puntaje'];
            $_detalles_extra=$value['detalles_extra'];
            $_numeroSitios=$value['numeroSitios'];
            $_precio=$value['precio'];
            $_duracion=$value['duracion'];
            $_director=$value['director'];
            $_afiche=$value['afiche'];
            $objetos[]=new Obra($_id, $_titulo, $_resena, $_autor, $_fechaDesde, $_fechaHasta, $_puntaje, $_detallesExtra, $_numeroSitios, $_precio, $_duracion, $_director, $_afiche);
            
        }
        return $objetos;
    }
    public function getObraById($id)
    {
        
        $objetos=$this->getTodasObras();
        foreach($objetos as $objeto)
        {
            if($objeto->get_id()==$id)
            {
                
                //print_r($objeto);
                return $objeto;
            }
        }
        
    }
}
?>