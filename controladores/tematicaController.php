<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"tematica"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

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

class TematicaController extends Tematica{

	/*=====  MOSTRAR IMAGENES  ======*/
	public function LlistaTematicas(){
		return $this->retornaTematicasTodas();
			
	}

	/*=====  MOSTRAR tematicas admin  ======*/
	public function LlistaTematicasEdit(){
		$tematicasList = $this->retornaTematicasTodas();
		require "../../vistas/juego/categorias/tematica-ver.php";

	}

	/*=====  ADD tematicas admin  ======*/
	public function AddTematicaBD($tematica){
		// return $this->addTematica($tematica);
		return $this->ResultadoAdd($this->addTematica($tematica));		
	}

	public function ResultadoAdd($resultat){

		if ($resultat){
			$_SESSION["msgAddFiltro"]= "El nuevo filtro se ha añadido correctamente.";
		}else{
			$_SESSION["msgErrAddFiltro"]= "No se ha podido añadir el filtro.";          
		} 
		header("location:../vistas/admin/admin-panelFiltros.php");
	}

	/*=====  EDIT tematicas admin  ======*/
	public function EditTematicaBD($id, $tematica){
		// return $this->editTematica($id, $tematica);
		return $this->ResultadoEdit($this->editTematica($id, $tematica));		
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


/*=====  Añadir Tematica  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="addTematica"){

	if(isset($_POST["filter"]) && !empty($_POST["filter"]) ){
		
		
		$a = new TematicaController();
		$a->AddTematicaBD(ucfirst($_POST["filter"]));


	}else{
		echo "Ha ocuurido un error";
	}
}


/*=====  Editar Tematica  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="updateTematica"){

	if(isset($_POST["filterupdate3"]) && !empty($_POST["filterupdate3"]) && isset($_POST["id3"]) && !empty($_POST["id3"])){

		$a = new TematicaController();
		$a->EditTematicaBD($_POST["id3"], ucfirst($_POST["filterupdate3"]));


	}else{
		echo "Ha ocuurido un error";
	}
}