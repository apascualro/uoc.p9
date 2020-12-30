<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"juego"), array('tipo'=>"controladores",'nombre'=>"sesiones"), array('tipo'=>"controladores",'nombre'=>"tipo"), array('tipo'=>"controladores",'nombre'=>"categoria"), array('tipo'=>"controladores",'nombre'=>"tematica"), array('tipo'=>"controladores",'nombre'=>"imagenes"));

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


class JuegosController extends Juego{

	/*=====  MOSTRAR JUEGOS habilitados ======*/

	public function LlistaJuegos(){
		$LlistatJue = $this->retornaJuegosVisibles();
		require "../vistas/juego/juego-ver.php";
	}

	/*=====  MOSTRAR filtros usados ======*/

	public function LlistaFiltros($filtro){
		$obj = $this->retornaJuegosTodos();

		$filtros = array();
		foreach ($obj as $key => $value) {
			$filtros [] = $value->$filtro;
		}
		return array_unique($filtros);
	}


	/*=====  MOSTRAR DETALLE JUEGOS  ======*/

	public function DetalleJuego($id){
		$propiedadesJuego = $this->retornaJuego($id);
		$_SESSION["propiedadesJuego"]= $propiedadesJuego;
		require "../vistas/juego/juego-detalles.php";
	}


	/*=====  MOSTRAR DETALLE JUEGO   ======*/

	public function DetalleJuegoReturn($id){
		return $this->retornaJuego($id);
	}


	/*=====  MOSTRAR JUEGOS TODOS - ADMIN  ======*/
	public function LlistaJuegosPerfil(){
		$Llistat = $this->retornaJuegosTodos();
		require "../../vistas/admin/admin-juegos.php";
	}

	/*=====  MOSTRAR JUEGOS FILTRO  ======*/

	public function LlistaJuegosFiltro($filtro, $palabra){
		return $this->retornaJuegoFiltro($filtro, $palabra);
	}

	//*=====  MODIFICAR JUEGO - ADMIN  ======*/

	/*muestra los datos a modificar*/
	public function MostrarModificarJuego(){
		$a = new TipoController();
		$tiposNom = $a->LlistaTipos();

		$b = new CategoriaController();
		$categoriasNom = $b->LlistaCategorias();

		$c = new TematicaController();
		$tematicasNom = $c->LlistaTematicas();

		$Llistat = $this->retornaJuego($_SESSION["idJuego"]);

		if (file_exists("../vistas/admin/admin-juegomodificar.php")){
			require_once "../vistas/admin/admin-juegomodificar.php";
		}
		if (file_exists("../../vistas/admin/admin-juegomodificar.php")){
			require_once "../../vistas/admin/admin-juegomodificar.php";
		}

	}

	/*envia la peticion*/
	public function ModificarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $jugadores, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo, $nombre_foto){

		$c = new ImagenesController();
		$c->UpdateImagenPortada($idJuego, $nombre_foto);

		$cambios = $this->editarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $jugadores, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo);

		if($c || $cambios){
			return $this->ResultadoModificarJuego(true);
		}elseif($c && $cambios){
			return $this->ResultadoModificarJuego(true);
		}else{
			return $this->ResultadoModificarJuego(false);
		}

	}

	/*muestra el resultado*/
	public function ResultadoModificarJuego($resultat){
		if ($resultat){
			$_SESSION["msgUpdateJuego"]="Juego modificado correctamente.";
		}else{
			$_SESSION["errUpdateJuego"]="El Juego no se ha podido modificar.";
		}
		header("location: ../../vistas/admin/admin-panelModificarJuego.php");
		exit;

	}

	/*=====  AÑADIR JUEGOS - ADMIN  ======*/

	/*muestra el panel de añadir*/
	public function MostrarAddJuego(){

		$a = new TipoController();
		$tiposNom = $a->LlistaTipos();

		$b = new CategoriaController();
		$categoriasNom = $b->LlistaCategorias();

		$c = new TematicaController();
		$tematicasNom = $c->LlistaTematicas();

		if (file_exists("../vistas/admin/admin-juegoadd.php")){
			require_once "../vistas/admin/admin-juegoadd.php";
		}
		if (file_exists("../../vistas/admin/admin-juegoadd.php")){
			require_once "../../vistas/admin/admin-juegoadd.php";
		}

	}

	/*envia la peticion*/
	public function AddJuegoDB($nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $num_jugadores, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo, $portada, $array){
		
		return $this->ResultadoAñadirJuego( $this->addJuego( $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $num_jugadores, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo, $portada, $array));
		// $this->ResultadoAñadirJuego($this->addJuego( $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $num_jugadores, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo, $portada, $array));
	}

	/*muestra el resultado*/
	public function ResultadoAñadirJuego($resultat){
		if ($resultat){
			$_SESSION["msgAddJuego"]="Juego Añadido correctamente";
		}else{
			$_SESSION["errAddJuego"]="El Juego no se ha podido Añadir";
		}
		header("location: ../../vistas/admin/admin-panelJuegoAdd.php");
		exit;
	}

	/*actualiza puntuacion*/
	public function UpdateValoracion($valoracion, $juego){
		$this->updateValoracionJuego($valoracion, $juego);
		
	}

	/*=====  RETORNA PUNTUACIÓN JUEGO  ======*/

	public function PuntuacionJuego($id){
		$juego = $this->retornaJuego($id);
		foreach ($juego as $key => $value) {
			return $value->valoracion;
		}

	}

	/*=====  MOSTRAR JUEGO NUEVO ======*/

	public function JuegoNuevo(){
		return $this->retornaJuegoNuevo();
	}


}




/*=============================================
=                  Operaciones 		          =
=============================================*/


/*=====  	ver juego 	 ======*/

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
	$objecte = new JuegosController();
	$objecte->LlistaJuegos();
}

/*=====  	detalles juego 	 ======*/

if(isset($_GET["operacio"]) && $_GET["operacio"]=="detalles"){
	if (isset($_GET["juego"]) && !empty(($_GET["juego"]))){
		$_SESSION["idJuego"]= $_GET["juego"];
		$objecte = new JuegosController();
		$objecte->DetalleJuego($_GET["juego"]);
	}else{
		echo "Operación No permitida";
	}
}

/*=====  	modificar  juego 	 ======*/

/*muestra la pagina de modificar*/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
	if (isset($_GET["juego"]) && !empty(($_GET["juego"]))){
		$_SESSION["idJuego"]= $_GET["juego"];
		header("location: ../vistas/admin/admin-panelModificarJuego.php");
	}else{
		echo "Operación No permitida";
	}
}

/**cambia los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){

	if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["complejidad"]) && isset($_POST["tipo"]) && isset($_POST["categoria"]) && isset($_POST["tematica"])){

		if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["complejidad"]) && !empty($_POST["tipo"]) && !empty($_POST["categoria"]) && !empty($_POST["tematica"])){


			if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/")){
				mkdir($_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/");
			}

			$ruta_imagenes = $_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/";

			if (isset($_FILES["fotoportada"]) && ($_FILES["fotoportada"]["name"])!=null){

				$nombre_foto = generateRandomString().$_FILES["fotoportada"]["name"];
				$tmp_foto = $_FILES["fotoportada"]["tmp_name"];
				$rutaFoto = $ruta_imagenes.$nombre_foto;
				copy($tmp_foto, $rutaFoto);

			}else{
				$nombre_foto=$_POST["img_p"];

			}

			
			if(!empty($_POST["es_activo"])){
				$es_activo= "1";
			}else{
				$es_activo="0";
			}

			empty($_POST["autor"]) ? $autor = null : $autor = $_POST["autor"];
			empty($_POST["year"]) ? $year = null : $year = $_POST["year"];
			empty($_POST["distribuidora"]) ? $distribuidora = null : $distribuidora = $_POST["distribuidora"];
			empty($_POST["edad"]) ? $edad = null : $edad = $_POST["edad"];
			empty($_POST["tiempo"]) ? $tiempo = null : $tiempo = $_POST["tiempo"];
			empty($_POST["jugadores"]) ? $jugadores = null : $jugadores = $_POST["jugadores"];
			empty($_POST["medidas"]) ? $medidas = null : $medidas = $_POST["medidas"];

			$nuevoObjeto = new JuegosController();
			$nuevoObjeto->ModificarJuego($_POST["id"], $_POST["nombre"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["autor"], $_POST["year"], $_POST["distribuidora"], $_POST["edad"], $_POST["tiempo"], $_POST["jugadores"], $_POST["medidas"], $_POST["complejidad"], $_POST["tipo"], $_POST["categoria"], $_POST["tematica"], $es_activo, $nombre_foto);

		}
		else{
			echo "Faltan Los datos!<br>";
		}
	}else{
		echo "Operacion No permitida";
        //header("location: index.php");
	}

}

/*=====  	añadir juego 	 ======*/

/**muestra la pagina de añadir**/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="add"){
	header("location: ../vistas/admin/admin-panelJuegoAdd.php");
}


/**añadir imagen**/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addImage"){
	
	// $a = $_POST["data"];
	// $_SESSION['data'] = $a;
	if($_POST["datos"]){
		echo "existe";
	}
}

/*gestionar imagenes*/
if(isset($_POST['operacio2']) && $_POST['operacio2']=='fotus'){
	if(isset($_FILES['files'])){

		$countfiles = count($_FILES['files']['name']);

	// Upload directory
		if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/")){
			mkdir($_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/");
		}
		$upload_location = $_SERVER["DOCUMENT_ROOT"]."/vistas/assets/img/";

		$files_arr = array();
		$filesBD_arr = array();

		/*imagen portada*/
		$filename2 = $_FILES['foto']['name'];
		$nom2 = generateRandomString().$_FILES["foto"]["name"];
		$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
		$valid_ext = array("png","jpeg","jpg");

		if(in_array($ext2, $valid_ext)){

     		// File path
			$path = $upload_location.$nom2;

     		// Upload file
			move_uploaded_file($_FILES['foto']['tmp_name'],$path);
			$_SESSION['portada'] = $nom2;
		}
		/**/

		/*imagenes*/	
		for($index = 0;$index < $countfiles;$index++){

   			// File name
			$filename = $_FILES['files']['name'][$index];	
			$nom = generateRandomString().$_FILES["files"]["name"][$index];

   			// Get extension
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

   			// Valid image extension
			// $valid_ext = array("png","jpeg","jpg");

   			// Check extension
			if(in_array($ext, $valid_ext)){

     		// File path
				$path = $upload_location.$nom;

     		// Upload file
				if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
					$files_arr[] = $path;
					$filesBD_arr[] = $nom;
				}
			}

		}


		$_SESSION['array_img'] = $filesBD_arr;
		print_r($filesBD_arr);
		print_r($_SESSION['portada']);

		die;
	}
	
}




/**cambia los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addJuego"){

	if (isset($_POST["nombre"]) && isset($_POST["subtitulo"]) && isset($_POST["autor"]) && isset($_POST["descripcion"]) && isset($_POST["complejidad"]) && isset($_POST["tipo"]) && isset($_POST["categoria"]) && isset($_POST["tematica"])){

		if (!empty($_POST["nombre"]) && !empty($_POST["subtitulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["complejidad"]) && !empty($_POST["tipo"]) && !empty($_POST["categoria"]) && !empty($_POST["tematica"])){
			
			/*juego dehabilitado*/
			if(!empty($_POST["es_activo"])){
				$es_activo= "1";
			}else{
				$es_activo="0";
			}

			empty($_POST["autor"]) ? $autor = null : $autor = $_POST["autor"];
			empty($_POST["year"]) ? $year = null : $year = $_POST["year"];
			empty($_POST["distribuidora"]) ? $distribuidora = null : $distribuidora = $_POST["distribuidora"];
			empty($_POST["edad"]) ? $edad = null : $edad = $_POST["edad"];
			empty($_POST["tiempo"]) ? $tiempo = null : $tiempo = $_POST["tiempo"];
			empty($_POST["jugadores"]) ? $jugadores = null : $jugadores = $_POST["jugadores"];
			empty($_POST["medidas"]) ? $medidas = null : $medidas = $_POST["medidas"];

			if(isset($_SESSION['array_img'])){
				$array = $_SESSION['array_img'];
			}else{
				$array = [];
			}
			
			// echo $_POST["nombre"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["autor"], $_POST["year"], $_POST["distribuidora"], $_POST["edad"], $_POST["tiempo"], $_POST["jugadores"], $_POST["medidas"], $_POST["complejidad"], $_POST["tipo"], $_POST["categoria"], $_POST["tematica"], $es_activo;
			// echo $_SESSION['portada'];

			$nuevoObjeto = new JuegosController();
			$nuevoObjeto->AddJuegoDB($_POST["nombre"], $_POST["subtitulo"], $_POST["descripcion"], $_POST["autor"], $_POST["year"], $_POST["distribuidora"], $_POST["edad"], $_POST["tiempo"], $_POST["jugadores"], $_POST["medidas"], $_POST["complejidad"], $_POST["tipo"], $_POST["categoria"], $_POST["tematica"], $es_activo, $_SESSION['portada'], $array);


		}
		else{
			echo "Faltan Los datos!<br>";
		}
	}else{
		echo "Operacion No permitida";
        //header("location: index.php");
	}

	unset( $_SESSION['array_img'], $_SESSION['portada']);

}



function generateRandomString($length = 5) {
	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}