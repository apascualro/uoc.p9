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

	/*=====  MOSTRAR IMAGENES juego  ======*/

	public function LlistaImagenes($id){
		$Llistat = $this->retornaImagenes($id);
		require "../vistas/juego/imagenes/imagen-ver.php";
	}

	/*=====  MOSTRAR IMAGEN PORTADA  ======*/

	public function ImagenPortada($id){
		return $this->retornaImagenPortada($id);
	}


	/*=====  MOSTRAR IMAGEN UPLOAD ======*/

	public function MostrarImagenUpload(){
		if (file_exists("../juego/imagenes/imagen-upload.php")){
			require_once "../juego/imagenes/imagen-upload.php";
		}
	}

	/*=====  GET IMAGENES noticia  ======*/

	public function ImagenesNoticia($id){
		return $this->retornaImagenes($id);
	}

	/*=====  MOSTRAR IMAGEN EDIT ======*/

	public function MostrarImagenEdit(){
		if (file_exists("../juego/imagenes/imagen-edit.php")){
			require_once "../juego/imagenes/imagen-edit.php";
		}
	}

	/*=====  UPDATE IMAGENES noticia  ======*/

	public function UpdateImagenPortada($id, $nombre){
		return $this->editarPortada($id, $nombre);
	}

}



