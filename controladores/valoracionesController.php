<?php
ob_start();
if (file_exists("../modelos/valoracion-modelo.php")){
	require_once "../modelos/valoracion-modelo.php";
}
if (file_exists("../../modelos/valoracion-modelo.php")){
	require_once "../../modelos/valoracion-modelo.php";
}
if (file_exists("../../../modelos/valoracion-modelo.php")){
	require_once "../../../modelos/valoracion-modelo.php";
}
if (file_exists("../../../../modelos/valoracion-modelo.php")){
	require_once "../../../../modelos/valoracion-modelo.php";
}

if (file_exists("../controladores/juegosController.php")){
	require_once "../controladores/juegosController.php";
}
if (file_exists("../../controladores/juegosController.php")){
	require_once "../../controladores/juegosController.php";
}
if (file_exists("../../../controladores/juegosController.php")){
	require_once "../../../controladores/juegosController.php";
}
if (file_exists("../../../../controladores/juegosController.php")){
	require_once "../../../../controladores/juegosController.php";
}

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

/**
 * 
 */
class ValoracionesController extends Valoracion
{

	/*=====  Mostrar valoraciones juego  ======*/

	public function LlistaValoraciones($id){
		$LlistatVal = $this->retornaValoracion($id);
		require "../vistas/juego/valoracion/valoracion-ver.php";
	}


	/*=====  Añadir valoraciones juego  ======*/

	/*envaia la peticion*/
	public function AddValoracionDB($puntuacion, $juego, $usuario)
	{
		$this->resultadoAddValoracion($this->addValoracion($puntuacion, $juego, $usuario));
	}
	
	/*muestra el resultado*/
	public function resultadoAddValoracion($resultat){
		// if ($resultat){
		// 	$_SESSION["valResultado"]="
		// 	<div style='background-color: green; height: 20px; text-align: center; padding-top: 5px;'>
		// 	<p>Valoracion añadida</p>
		// 	<div>";
		// }else{
		// 	$_SESSION["valResultado"]="
		// 	<div style='background-color: red; height: 20px; text-align: center; padding-top: 5px;'>
		// 	<p>Valoracion NO añadida</p>
		// 	<div>";
		// }
		header("location: ../../vistas/juego/juego-detalles.php");
		exit;

	}


}

/*=============================================
=                  Operaciones 		          =
=============================================*/



/*=====  Añadir Valoracion  ======*/

/**cambia los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addValoracion"){

	if (isset($_POST["options"])){
		$_SESSION["idUsuario"] = 3;
		$nuevoObjeto = new ValoracionesController();
		$nuevoObjeto->AddValoracionDB($_POST["options"], $_SESSION["idJuego"], $_SESSION["idUsuario"]);
	}else{
		echo "Faltan Los datos!<br>";
	}
}






?>