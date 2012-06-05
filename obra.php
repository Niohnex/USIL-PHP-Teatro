<?php
class obra{
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

	
	public function _insertObra(){
		$sql = "INSERT INTO 'Obras' ('idObras', 'titulo', 'resena', 'autor', 'fecha_desde', 'fecha_hasta', 'puntaje', 'detalles_extra', 'numeroSitios', " + 
				"'precio', 'duracion', 'director', afiche') VALUES ($this->_id, $this->_titulo, $this->_resena, $this->_autor, $this->_fechaDesde, " + 
				"$this->_fechaHasta, $this->_puntaje, $this->_detallesExtra, $this->_numeroSitios, $this->_precio, $this->_duracion, $this->_director, "
				"$this->_afiche)";
		
		mysql_query($sql) OR die (mysql_error());
		echo "Obra Agregada";
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
}
?>