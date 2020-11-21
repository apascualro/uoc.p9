<?php 
ob_start();
if (file_exists("../modelos/comentario-modelo.php")){
	require_once "../modelos/comentario-modelo.php";
}
if (file_exists("../../modelos/comentario-modelo.php")){
	require_once "../../modelos/comentario-modelo.php";
}
if (file_exists("../../../modelos/comentario-modelo.php")){
	require_once "../../../modelos/comentario-modelo.php";
}
if (file_exists("../../../../modelos/comentario-modelo.php")){
	require_once "../../../../modelos/comentario-modelo.php";
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
class ComentariosController extends Comentario
{
	
	/**
     * Mostrar comentarios todos
     * @param $id
     */
	public function LlistaComentariosJuego($id){
		$Llistat = $this->retornaComentariosJuego($id);
		require "../vistas/juego/comentario/comentario-ver.php";
	}

}

?>