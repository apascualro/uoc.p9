<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"valoracion"),array('tipo'=>'modelos','nombre'=>'juego'), array('tipo'=>'controladores', 'nombre'=>'juegos'), array('tipo'=>'controladores', 'nombre'=>'sesiones'));

foreach ($modelos as $i => $key) {

	if($key['tipo']== "modelos"){
		$ruta = $key['nombre']."-modelo.php";
	}else{
		$ruta = $key['nombre']."Controller.php";
	}
	
	if (file_exists("../".$key['tipo']."/". $ruta)){
		require_once "../".$key['tipo']."/". $ruta;
	}
	if (file_exists("../../".$key['tipo']."/". $ruta)){
		require_once "../../".$key['tipo']."/". $ruta;
	}
	if (file_exists("../../../".$key['tipo']."/". $ruta)){
		require_once "../../../".$key['tipo']."/". $ruta;
	}
	if (file_exists("../../../../".$key['tipo']."/". $ruta)){
		require_once "../../../../".$key['tipo']."/". $ruta;
	}
	
}

$objecteSessio = new SesionesController(); 

/**
 * 
 */
class ValoracionesController extends Valoracion
{

	/*=====  Mostrar valoraciones juego  ======*/

	public function LlistaValoraciones($juego, $usuario){
		$LlistatVal = $this->retornaValoracion($juego);
		require "../vistas/juego/valoracion/valoracion-ver.php";
	}



	/*=====  Añadir valoraciones juego  ======*/

	/*envia la peticion*/
	public function AddValoracionDB($puntuacion, $juego, $usuario)
	{	
		$this->resultadoAddValoracion($this->addValoracion($puntuacion, $juego, $usuario));
	}
	
	/*muestra el resultado*/
	public function resultadoAddValoracion($resultat){

		header("location: ../../vistas/juego/juego-detalles.php");
		exit;

	}


	/*=====  Cambiar valoraciones juego  ======*/

	/*envia la peticion*/
	public function changeValoracionDB($puntuacion, $juego, $usuario)
	{	
		$this->resultadoUpdateValoracion($this->changeValoracion($puntuacion, $juego, $usuario));
		echo "aaaaaaaaaaaa";
	}
	
	/*muestra el resultado*/
	public function resultadoUpdateValoracion($resultat){

		header("location: ../../vistas/juego/juego-detalles.php");
		exit;

	}



	/*=====  Comprobar valoraciones juego  ======*/

	public function comprobarValoracion($juego, $usuario){
		$a = $this->retornaValoracionUsuario($juego, $usuario);
		if($a){
			return $a[0]->puntuacion;
		}
	}


}

/*=============================================
=                  Operaciones 		          =
=============================================*/



/*=====  Añadir Valoracion  ======*/

/**inserta los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addValoracion"){

	if (isset($_POST["options"])){
		$nuevoObjeto = new ValoracionesController();
		$nuevoObjeto->AddValoracionDB($_POST["options"], $_SESSION["idJuego"], $_SESSION["idUsuario"]);
	}else{
		echo "Faltan Los datos!<br>";
	}
}

/**inserta los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="updateValoracion"){

	if (isset($_POST["options"])){
		$nuevoObjeto = new ValoracionesController();
		$nuevoObjeto->changeValoracionDB($_POST["options"], $_SESSION["idJuego"], $_SESSION["idUsuario"]);
	}else{
		echo "Faltan Los datos!<br>";
	}
}





?>
