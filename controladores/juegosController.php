<?php
if (file_exists("../modelos/juego-modelo.php")){
	require_once "../modelos/juego-modelo.php";
}
if (file_exists("../../modelos/juego-modelo.php")){
	require_once "../../modelos/juego-modelo.php";
}
if (file_exists("../../../modelos/juego-modelo.php")){
	require_once "../../../modelos/juego-modelo.php";
}
if (file_exists("../../../../modelos/juego-modelo.php")){
	require_once "../../../../modelos/juego-modelo.php";
}
/*sesiones*/
if (file_exists("controladores/sesionesController.php")){
	require_once "controladores/sesionesController.php";
}
if (file_exists("../controladores/sesionesController.php")){
	require_once "../controladores/sesionesController.php";
}
if (file_exists("../../controladores/sesionesController.php")){
	require_once "../../controladores/sesionesController.php";
}
$objecteSessio = new SesionesController(); 

class JuegosController extends Juego{

	/*********MOSTRAR JUEGOS********/
	public function LlistaJuegos(){
		$Llistat = $this->retornaJuegosTodos();
		require "../vistas/juego/juego-ver.php";
	}


	/*********MOSTRAR JUEGOS - ADMIN ********/
	public function LlistaJuegosPerfil(){
		$Llistat = $this->retornaJuegosTodos();
		require "../../vistas/admin/admin-juegos.php";
	}


	/*********MODFICAR JUEGOS - ADMIN ********/
	/*muestra los datos a modificar*/
	public function mostrarModificarJuego(){
		$Llistat = $this->retornaJuego($_SESSION["idJuego"]);

		if (file_exists("../vistas/admin/admin-juegomodificar.php")){
			require_once "../vistas/admin/admin-juegomodificar.php";
		}
		if (file_exists("../../vistas/admin/admin-juegomodificar.php")){
			require_once "../../vistas/admin/admin-juegomodificar.php";
		}

	}
	/*envia la peticion*/
	public function ModificarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo){
		$this->resultadoModificarJuego($this->editarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo));
	}
	/*muestra el resultado*/
	public function resultadoModificarJuego($resultat){
		if ($resultat){
			$_SESSION["mensajeResultado"]="
			<div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
			<h1>Juego Modificado</h1>
			<div>";
		}else{
			$_SESSION["mensajeResultado"]="
			<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
			<h1>El Juego NO se ha podido Modificar</h1>
			<div>";
		}
		header("location: ../../vistas/admin/admin-panelModificarJuego.php");

	}
}



/*OPERACIONES */
/*********VER JUEGO*******/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
	$objecte = new JuegosController();
	$objecte->LlistaJuegos();
}

/*********MODIFICAR JUEGO*******/
/**muestra la pagina de modificar**/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
	if (isset($_GET["juego"]) && !empty(($_GET["juego"]))){
		$_SESSION["idJuego"]= $_GET["juego"];
		header("location: ../vistas/admin/admin-panelModificarJuego.php");
	}else{
		echo "Operación No permitida";
	}
}
/**cambia los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){

	if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["autor"]) && isset($_POST["descripcion"]) && isset($_POST["year"]) && isset($_POST["distribuidora"]) && isset($_POST["edad"]) && isset($_POST["tiempo"]) && isset($_POST["medidas"]) && isset($_POST["complejidad"]) && isset($_POST["tipo"]) && isset($_POST["categoria"]) && isset($_POST["tematica"])){

		if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["autor"]) && !empty($_POST["descripcion"]) && !empty($_POST["year"]) && !empty($_POST["distribuidora"]) && !empty($_POST["edad"]) && !empty($_POST["tiempo"]) && !empty($_POST["medidas"]) && !empty($_POST["complejidad"]) && !empty($_POST["tipo"]) && !empty($_POST["categoria"]) && !empty($_POST["tematica"])){
			if(!empty($_POST["es_activo"])){
				$es_activo= "1";
			}else{
				$es_activo="0";
			}
			$nuevoObjeto = new JuegosController();
			$nuevoObjeto->ModificarJuego($_POST["id"], $_POST["nombre"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["autor"], $_POST["year"], $_POST["distribuidora"], $_POST["edad"], $_POST["tiempo"], $_POST["medidas"], $_POST["complejidad"], $_POST["tipo"], $_POST["categoria"], $_POST["tematica"], $es_activo);

		}
		else{
			echo "Faltan Los datos!<br>";
		}
	}else{
		echo "Operacion No permitida";
        //header("location: index.php");
	}

}
