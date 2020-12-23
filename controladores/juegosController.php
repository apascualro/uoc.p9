<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"juego"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

foreach ($modelos as $i => $key) {
	$key['tipo']== "modelos" ? $ruta = $key['nombre']."-modelo.php" : $ruta = $key['nombre']."Controller.php";
	$nivel = "../"; $path = $key['tipo']."/". $ruta;

	for ($i=0; $i < 3; $i++) { 
		file_exists($path) ? require_once $path : false;
		$path = $nivel.$path;
	}
}

/*sesion*/
$objecteSessio = new SesionesController(); 


class JuegosController extends Juego{

	/*=====  MOSTRAR JUEGOS  ======*/

	public function LlistaJuegos(){
		$LlistatJue = $this->retornaJuegosTodos();
		require "../vistas/juego/juego-ver.php";
	}

	/*=====  MOSTRAR DETALLE JUEGOS  ======*/

	public function DetalleJuego($id){
		$propiedadesJuego = $this->retornaJuego($id);
		$_SESSION["propiedadesJuego"]= $propiedadesJuego;
		require "../vistas/juego/juego-detalles.php";
	}


	/*=====  MOSTRAR DETALLE JUEGOS - ADMIN  ======*/
	public function LlistaJuegosPerfil(){
		$Llistat = $this->retornaJuegosTodos();
		require "../../vistas/admin/admin-juegos.php";
	}

	/*=====  MOSTRAR JUEGOS FILTRO  ======*/

	public function LlistaJuegosFiltro($filtro, $palabra){
		return $this->retornaJuegoFiltro($filtro, $palabra);
	}

	//*=====  MODIFICAR JUEGO - ADMIN  ======*/

	/*muestra los datos a modificar*/
	public function MostrarModificarJuego(){
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

		$this->ResultadoModificarJuego($this->editarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo));
	}

	/*muestra el resultado*/
	public function ResultadoModificarJuego($resultat){
		if ($resultat){
			$_SESSION["mensajeResultado"]="
			<div class='row'><div class='col-12'><span class='msg'>Juego modificado</span></div></div>";
		}else{
			$_SESSION["mensajeResultado"]="
			<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
			<h1>El Juego NO se ha podido Modificar</h1>
			<div>";
		}
		header("location: ../../vistas/admin/admin-panelModificarJuego.php");
		exit;

	}

	/*=====  AÑADIR JUEGOS - ADMIN  ======*/

	/*muestra el panel de añadir*/
	public function MostrarAddJuego(){
		if (file_exists("../vistas/admin/admin-juegoadd.php")){
			require_once "../vistas/admin/admin-juegoadd.php";
		}
		if (file_exists("../../vistas/admin/admin-juegoadd.php")){
			require_once "../../vistas/admin/admin-juegoadd.php";
		}

	}

	/*envia la peticion*/
	public function AddJuegoDB($nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo){

		$this->ResultadoAñadirJuego($this->añadirJuego( $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo));
	}

	/*muestra el resultado*/
	public function ResultadoAñadirJuego($resultat){
		if ($resultat){
			$_SESSION["mensajeResultado"]="
			<div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
			<h1>Juego Añadido</h1>
			<div>";
		}else{
			$_SESSION["mensajeResultado"]="
			<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
			<h1>El Juego NO se ha podido Modificar</h1>
			<div>";
		}
		header("location: ../../vistas/admin/admin-panelModificarJuego.php");
		exit;
	}

	/*actualiza puntuacion*/
	public function UpdateValoracion($valoracion, $juego){
		$this->updateValoracionJuego($valoracion, $juego);
		
	}

	


}




/*=============================================
=                  Operaciones 		          =
=============================================*/


/*=====  	ver juego 	 ======*/

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
	$objecte = new JuegosController();
	$objecte->LlistaJuegos();
}

/*=====  	detalles juego 	 ======*/

if(isset($_GET["operacio"]) && $_GET["operacio"]=="detalles"){
	if (isset($_GET["juego"]) && !empty(($_GET["juego"]))){
		$_SESSION["idJuego"]= $_GET["juego"];
		$objecte = new JuegosController();
		$objecte->DetalleJuego($_GET["juego"]);
	}else{
		echo "Operación No permitida";
	}
}

/*=====  	modificar  juego 	 ======*/

/*muestra la pagina de modificar*/
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

/*=====  	añadir juego 	 ======*/

/**muestra la pagina de añadir**/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="add"){
	header("location: ../vistas/admin/admin-panelJuegoAdd.php");
}
/**cambia los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addJuego"){

	if (isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["autor"]) && isset($_POST["descripcion"]) && isset($_POST["year"]) && isset($_POST["distribuidora"]) && isset($_POST["edad"]) && isset($_POST["tiempo"]) && isset($_POST["medidas"]) && isset($_POST["complejidad"]) && isset($_POST["tipo"]) && isset($_POST["categoria"]) && isset($_POST["tematica"])){

		if (!empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["autor"]) && !empty($_POST["descripcion"]) && !empty($_POST["year"]) && !empty($_POST["distribuidora"]) && !empty($_POST["edad"]) && !empty($_POST["tiempo"]) && !empty($_POST["medidas"]) && !empty($_POST["complejidad"]) && !empty($_POST["tipo"]) && !empty($_POST["categoria"]) && !empty($_POST["tematica"])){
			if(!empty($_POST["es_activo"])){
				$es_activo= "1";
			}else{
				$es_activo="0";
			}
			$nuevoObjeto = new JuegosController();
			$nuevoObjeto->AddJuegoDB($_POST["nombre"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["autor"], $_POST["year"], $_POST["distribuidora"], $_POST["edad"], $_POST["tiempo"], $_POST["medidas"], $_POST["complejidad"], $_POST["tipo"], $_POST["categoria"], $_POST["tematica"], $es_activo);

		}
		else{
			echo "Faltan Los datos!<br>";
		}
	}else{
		echo "Operacion No permitida";
        //header("location: index.php");
	}

}
