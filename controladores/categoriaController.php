<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"categoria"), array('tipo'=>"controladores",'nombre'=>"sesiones"), array('tipo'=>"controladores",'nombre'=>"juegos"));

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

class CategoriaController extends Categoria{

	/*=====  MOSTRAR IMAGENES  ======*/
	public function LlistaCategorias(){
		return $this->retornaCategoriasTodas();		
	}

	/*=====  MOSTRAR IMAGENES  ======*/
	public function LlistaCategoriasLlenas(){
		return $this->retornaCategoriasTodas();	

		$c = new JuegosController();
		$categoriasUso = $this->LlistaFiltros($palabra);

	}


	/*=====  MOSTRAR categorias admin  ======*/
	public function LlistaCategoriasEdit(){
		$categoriasList = $this->retornaCategoriasTodas();
		require "../../vistas/juego/categorias/categoria-ver.php";

	}

	/*=====  ADD categorias admin  ======*/
	public function AddCategoriaBD($categoria){

		return $this->ResultadoAdd($this->addCategoria($categoria));		
	}

	public function ResultadoAdd($resultat){

		if ($resultat){
			$_SESSION["msgAddFiltro"]= "El nuevo filtro se ha añadido correctamente.";
		}else{
			$_SESSION["msgErrAddFiltro"]= "No se ha podido añadir el filtro.";          
		} 
		header("location:../vistas/admin/admin-panelFiltros.php");
	}

	/*=====  EDIT categorias admin  ======*/
	public function EditCategoriaBD($id, $categoria){

		return $this->ResultadoEdit($this->editCategoria($id, $categoria));		
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


/*=====  Añadir Categoria  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="addCategoria"){

	if(isset($_POST["filter"]) && !empty($_POST["filter"]) ){
		
		
		$a = new CategoriaController();
		$a->AddCategoriaBD(ucfirst($_POST["filter"]));


	}else{
		echo "Ha ocuurido un error";
	}
}


/*=====  Editar Categoria  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="updateCategoria"){

	if(isset($_POST["filterupdate2"]) && !empty($_POST["filterupdate2"]) && isset($_POST["id2"]) && !empty($_POST["id2"])){

		$a = new CategoriaController();
		$a->EditCategoriaBD($_POST["id2"], ucfirst($_POST["filterupdate2"]));


	}else{
		echo "Ha ocuurido un error";
	}
}