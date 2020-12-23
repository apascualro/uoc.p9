<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"imagen"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

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


class ImagenesController extends Imagen{

	/*=====  MOSTRAR IMAGENES  ======*/

	public function LlistaImagenes($id){
		$Llistat = $this->retornaImagenes($id);
		require "../vistas/juego/imagenes/imagen-ver.php";
	}

	/*=====  MOSTRAR IMAGEN PORTADA  ======*/

	public function ImagenPortada($id){
		return $this->retornaImagenPortada($id);
	}




}