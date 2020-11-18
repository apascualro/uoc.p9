<?php
ob_start();
if (file_exists("../modelos/imagen-modelo.php")){
	require_once "../modelos/imagen-modelo.php";
}
if (file_exists("../../modelos/imagen-modelo.php")){
	require_once "../../modelos/imagen-modelo.php";
}
if (file_exists("../../../modelos/imagen-modelo.php")){
	require_once "../../../modelos/imagen-modelo.php";
}
if (file_exists("../../../../modelos/imagen-modelo.php")){
	require_once "../../../../modelos/imagen-modelo.php";
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

class ImagenesController extends Imagen{

	/*********MOSTRAR IMAGENES********/
	public function LlistaImagenes($id){
		$Llistat = $this->retornaImagenes($id);
		require "../vistas/imagenes/imagen-ver.php";
	}

		/*********MOSTRAR IMAGEN PORTADA********/
	public function ImagenPortada($id){
		return $this->retornaImagenPortada($id);
	}




}