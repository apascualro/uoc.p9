<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"tipo"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

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

class TipoController extends Tipo{

	/*=====  MOSTRAR tipos  ======*/
	public function LlistaTipos(){
		return $this->retornaTiposTodas();

	}

	/*=====  MOSTRAR tipos admin  ======*/
	public function LlistaTiposEdit(){
		$tiposList = $this->retornaTiposTodas();
		require "../../vistas/juego/categorias/tipo-ver.php";

	}

	/*=====  ADD tipos admin  ======*/
	public function AddTipoBD($tipo){
		// return $this->addTipo($tipo);
		return $this->ResultadoAdd($this->addTipo($tipo));		
	}

	public function ResultadoAdd($resultat){

		if ($resultat){
			$_SESSION["msgAddFiltro"]= "El nuevo filtro se ha añadido correctamente.";
		}else{
			$_SESSION["msgErrAddFiltro"]= "No se ha podido añadir el filtro.";          
		} 
		header("location:../vistas/admin/admin-panelFiltros.php");
	}

	/*=====  EDIT tipos admin  ======*/
	public function EditTipoBD($id, $tipo){

		return $this->ResultadoEdit($this->editTipo($id, $tipo));		
	}

	public function ResultadoEdit($resultat){

		if ($resultat){
			$_SESSION["msgAddFiltro"]= "El filtro se ha modificado correctamente.";
		}else{
			$_SESSION["msgErrAddFiltro"]= "No se ha podido modificar el filtro.";          
		} 
		header("location:../vistas/admin/admin-panelFiltros.php");
	}

}


/*=============================================
=                  Operaciones 		          =
=============================================*/


/*=====  Añadir Tipo  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="addTipo"){

	if(isset($_POST["filter"]) && !empty($_POST["filter"]) ){
		
		
		$a = new TipoController();
		$a->AddTipoBD(ucfirst($_POST["filter"]));


	}else{
		echo "Ha ocuurido un error";
	}
}


/*=====  Editar Tipo  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="updateTipo"){

	if(isset($_POST["filterupdate"]) && !empty($_POST["filterupdate"]) && isset($_POST["id"]) && !empty($_POST["id"])){

		$a = new TipoController();
		$a->EditTipoBD($_POST["id"], ucfirst($_POST["filterupdate"]));


	}else{
		echo "Ha ocuurido un error";
	}
}