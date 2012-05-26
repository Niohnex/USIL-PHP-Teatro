<?php
class obra{
	private $_id;
	private $_nombre;
	private $_autor;
	private $_director;
	private $_actor;
	private $_sala;
	private $_horario;
	private $_precio;
	private $_temporada;
	private $_afiche;
	private $_reseña;
	
	public function __construct($id, $nombre, $autor, $director, $actores, $sala, $horario, $precio, $temporada, $afiche, $reseña){
		$this->_id = $id;
		$this->_nombre = $nombre;
		$this->_autor = $autor;
		$this->_director = $director;
		$this->_actor = $actor;
		$this->_sala = $sala;
		$this->_horario = $horario;
		$this->_precio = $precio;
		$this->_temporada = $temporada;
		$this->_afiche = $afiche;
		$this->_reseña = $reseña;	
	}
	
	
}

?>