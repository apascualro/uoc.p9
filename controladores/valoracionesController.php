<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"valoracion"), array('tipo'=>"modelos",'nombre'=>"juego"), array('tipo'=>"controladores",'nombre'=>"juegos"), array('tipo'=>"controladores",'nombre'=>"usuarios"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

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



/**
 * 
 */
class ValoracionesController extends Valoracion
{

	/*=====  Mostrar valoraciones juego ======*/

	public function LlistaValoraciones($juego){
		$LlistatVal = $this->retornaValoracion($juego);
		require "../vistas/juego/valoracion/valoracion-ver.php";
	}

	/*=====  Comprobar valoraciones juego - usuario ======*/

	public function comprobarValoracion($juego, $usuario){
		$a = $this->retornaValoracionUsuario($juego, $usuario);
		if($a){
			return $a[0]->puntuacion;
		}
	}


	/*=====  Añadir valoraciones juego  ======*/

	/*envia la peticion*/
	public function AddValoracionDB($puntuacion, $juego, $usuario){	

		$this->resultadoAddValoracion($this->addValoracion($puntuacion, $juego, $usuario));
	}
	
	/*muestra el resultado*/
	public function resultadoAddValoracion($resultat){
		header("location: ../../vistas/juego/juego-detalles.php");
		exit;

	}

	/*muestra mensaje si cambia nivel*/
	public function MensajeNivel($nivel){
		return $_SESSION["updateNivel"]="Enhorabuena acabas de alcanzar el nivel". $nivel;
	}


	/*=====  Cambiar valoraciones juego  ======*/

	/*envia la peticion*/
	public function changeValoracionDB($puntuacion, $juego, $usuario){	
		
		$this->resultadoUpdateValoracion($this->changeValoracion($puntuacion, $juego, $usuario));
	}
	
	/*muestra el resultado*/
	public function resultadoUpdateValoracion($resultat){
		header("location: ../../vistas/juego/juego-detalles.php");
		exit;
	}


	/*=====  Retornar valoraciones juego ======*/

	public function CantidadValoraciones($juego){
		return $this->retornaValoracion($juego);
	}


	/*=====  Retornar valoraciones juego ======*/

	public function CantidadValoracionesNivel($juego){
		return $this->retornaValoracionNivel($juego);
	}


	/*=====  Contar valoraciones usuario ======*/

	public function CantidadValoracionesUsuario($usuario){
		return $this->retornaCantidadValoraciones($usuario);
	}

	/*=====  Comprobar valoraciones juego - usuario ======*/

	public function existeValoracion($juego, $usuario){
		$a = $this->retornaValoracionUsuario($juego, $usuario);
		if($a){
			return true;
		}else{
			return false;
		}
	}


	/*=====  Retornar valoraciones todas ======*/

	public function RetornarTodasValoraciones(){
		return $this->retornaValoracionesTodas();
	}

	
}

/*=============================================
=                  Operaciones 		          =
=============================================*/


/*=====  Añadir Valoracion  ======*/

/**inserta los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addValoracion"){

	if (isset($_POST["options"])){

		$puntuacion = $_POST["options"];

		/*calcula la nueva ppuntuacion del juego*/
		$res = CalculaPuntuacion($puntuacion, $_SESSION["idUsuario"]);
		// print_r($res);

		$check = new ValoracionesController();

		$x = $check->existeValoracion($_SESSION["idJuego"], $_SESSION["idUsuario"]);

		sleep(0.10);
		$nuevapuntuacion = new JuegosController();
		$a = $nuevapuntuacion->UpdateValoracion($res, $_SESSION["idJuego"]);

		/*comprueba puntuacion no duplicada*/
		if(!$x){		

			sleep(0.10);

			// /*añadir valoracion*/
			$nuevoObjeto = new ValoracionesController();
			$nuevoObjeto->AddValoracionDB($puntuacion, $_SESSION["idJuego"], $_SESSION["idUsuario"]);

		}

		// cambiar nivel
		$nuevoObjeto2 = new ValoracionesController();
		$n = $nuevoObjeto2->CantidadValoracionesUsuario($_SESSION["idUsuario"]);
		if($n){
			$num = count($n);

			$level = new UsuariosController();
			$qtt = $level->DevuelveNivelComentarios($num, $_SESSION["idUsuario"]);

			$nuevoObjeto2->MensajeNivel($qtt);
		}
		unset($res, $x, $a, $puntuacion);


	}else{
		echo "Faltan Los datos!<br>";
	}
}

/**inserta los datos en la BD*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="updateValoracion"){

	if (isset($_POST["options"])){

		$puntuacion = $_POST["options"];

		/*calcula la nueva ppuntuacion del juego*/
		$res = CalculaPuntuacion($puntuacion, $_SESSION["idUsuario"]);
		// print_r($res);
		
		sleep(0.10);

		// /*comprueba puntuacion no duplicada*/

		$nuevapuntuacion = new JuegosController();
		$a = $nuevapuntuacion->UpdateValoracion($res, $_SESSION["idJuego"]);
		sleep(0.10);	

		// actualizar valoraciones
		$nuevoObjeto = new ValoracionesController();
		$nuevoObjeto->changeValoracionDB($puntuacion, $_SESSION["idJuego"], $_SESSION["idUsuario"]);
		

		unset($puntuacion, $countExp, $countAmt, $countPri, $resultado, $expertoSum, $amateurSum, $principianteSum); 

		unset($res, $a, $puntuacion, $_POST["options"]);		

	}else{
		echo "Faltan Los datos!<br>";
	}
}


function CalculaPuntuacion($puntuacion, $usuario){

	/*Retornar nivel usuario*/
	$nuevoObjeto3 = new UsuariosController();
	$nivel = $nuevoObjeto3->NivelUsuario($usuario);

	if($nivel == "Moderador"){
		$nivel = "Experto";
	}

	$experto = array();
	$principiante = array();
	$amateur = array();

	/*Determinar el nivel*/
	switch ($nivel) {
		case 'Experto':
		$experto [] = $puntuacion;
		break;
		case 'Amateur':
		$amateur [] = $puntuacion;
		break;
		case 'Principiante':
		$principiante [] = $puntuacion;
		break;
		default:
		echo "error";
		break;
	}

	$valExp = 100;
	$valAmt = 90;
	$valPri = 80;

	/*Asignar valor porcentual*/
	$nuevoObjeto4 = new ValoracionesController();
	$b = $nuevoObjeto4->CantidadValoracionesNivel($_SESSION["idJuego"]);

	
	if(!empty($b)){
		foreach ($b as $key => $value) {
			$c = $value->nivel;
			switch ($c) {
				case 'Experto':
				$experto [] = $value->puntuacion;
				break;
				case 'Amateur':
				$amateur [] = $value->puntuacion;
				break;
				case 'Principiante':
				$principiante [] = $value->puntuacion;
				break;
				default:
				echo "error";
				break;
			}
		}
	}
	

	$expertoSum = array();
	$amateurSum = array();
	$principianteSum = array();


	/*añadir puntuaciones por niveles*/
	if(!empty($experto)){
		$countExp = count($experto);
		if($countExp >1){					
			foreach ($experto as $key) {
				$expertoSum [] = $key*$valExp;
			}
		}else{
			$expertoSum [] = $experto[0]*$valExp;
		}		
	}

	if(!empty($amateur)){
		$countAmt = count($amateur);
		if($countAmt >1){					
			foreach ($amateur as $key) {
				$amateurSum [] = $key;
			}
		}else{
			$amateurSum [] = $amateur[0]*$valAmt;
		}		
	}

	if(!empty($principiante)){
		$countPri = count($principiante);
		if($countPri >1){					
			foreach ($principiante as $key) {
				$principianteSum [] = $key*$valExp;
			}
		}else{
			$principianteSum [] = $principiante[0]*$valPri;
		}		
	}


	$todas = array_merge($expertoSum, $amateurSum, $principianteSum);
	$generalCount = count($todas);


	$resultado = (array_sum($todas)/$generalCount)/100;
	return $resultado;
}




?>
