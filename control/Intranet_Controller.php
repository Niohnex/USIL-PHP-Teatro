<?php 

	require_once (../model/Obra.php);
	require_once(../mode/Usuario);
	
	if (!empty($_GET['action']))
	{
		// Crear objeto e ejecutar accion
	} else {
		// Imprimir Pagina por defecto
	}

	class Intranet_Controller {

		// public function _createObra($v_titulo, $v_resena, $v_autor, $v_fechadesde, $v_fechahasta, $v_puntaje, $v_detallesExtra, $v_numeroSitios, $v_precio, $v_duracion, $v_director, $v_afiche)
		function add_obra () {
			$_titulo = $_POST['titulo'];
			$_resena = $_POST['resena'];
			$_autor = $_POST['autor'];
			$_fechadesde = $_POST['fechadesde'];
			$_fechahasta = $_POST['fechahasta'];
			$_puntaje = $_POST['puntaje'];
			$_detallesextra = $_POST['detallesextra'];
			$_numerositios = $_POST['numerositios'];
			$_precio = $_POST['precio'];
			$_duracion = $_POST['duracion'];
			$_director = $_POST['director'];
			$_afiche = $_POST['afiche'];
			
			$temp_obra = new Obra();
			$temp_obra->_createObra($_titulo, $_resena, $_autor, $_fechadesde, $_fechahasta, $_puntaje, $_detallesextra, $_numerositios, $_precio, $_duracion, $_director, $_afiche);
			
			
			
		}
		
		function delete_obra () {
			
		}
		
		function modify_obra () {
			
		}
		
		
		
	}
?>
