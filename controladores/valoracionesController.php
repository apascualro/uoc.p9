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


class ValoracionesController extends Valoracion{

	/*********MOSTRAR IMAGENES********/
	public function LlistaValoraciones($id){
		$Llistat = $this->retornaValoracion($id);
		require "../vistas/valoracion/valoracion-ver.php";
	}


}