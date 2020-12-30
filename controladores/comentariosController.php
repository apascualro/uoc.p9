<?php 
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"comentario"), array('tipo'=>"modelos",'nombre'=>"juego"), array('tipo'=>"controladores",'nombre'=>"juegos"), array('tipo'=>"controladores",'nombre'=>"sesiones"), array('tipo'=>"controladores",'nombre'=>"usuarios"), );

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


class ComentariosController extends Comentario{
	
	/*===== VER COMENTARIOS ======*/
	/*usuario con comentario*/
	public function LlistaComentariosJuego($juego, $idcom){
		$Llistat = $this->retornaComentariosJuegoVisibles($juego);
		foreach ($Llistat as $key => $object) {
			if($object->idComentario == $idcom) {
				unset($Llistat[$key]);
			}
		}
		require "../vistas/juego/comentario/comentario-ver.php";
	}
	/*usuario sin comentario*/
	public function LlistaComentariosJuegoNo($juego){
		$Llistat = $this->retornaComentariosJuegoVisibles($juego);
		require "../vistas/juego/comentario/comentario-ver.php";
	}

	/*===== AÑADIR COMENTARIO ======*/
	/*enviar peticion*/
	public function AddComentario($juego, $usuario, $titulo, $descripcion){
		$this->ResultadoAddComentario($this->AddComentarioDB($juego, $usuario, $titulo, $descripcion), $juego);
	}

	/*enviar peticion con puntuaciones*/
	// public function AddComentarioTodo($juego, $usuario, $titulo, $descripcion, $op1, $op2, $op3, $op4, $op5, $op6){
	// 	$this->ResultadoAddComentario($this->AddComentarioDBtodo($juego, $usuario, $titulo, $descripcion, $op1, $op2, $op3, $op4, $op5, $op6), $juego, $usuario, $titulo, $descripcion, $op1, $op2, $op3, $op4, $op5, $op6);
	// }

	/*mensaje resultado*/
	public function ResultadoAddComentario($resultat,$juego){
		if ($resultat){
			$_SESSION["mensajeComentario"]="Tu comentario se ha guardado correctamente.";
		}else{
			$_SESSION["mensajeComentario"]="Tu comentario NO se ha guardado.";
			;
		}
		$a = new JuegosController();
		$a->DetalleJuego($juego);
	}


	/*===== VER COMENTARIO - usuario y juego ======*/
	public function ComprobarComentario($usuario, $juego){
		return $this->retornaComentarioUsuario($usuario, $juego);
	}

	/*===== CONTAR COMENTARIOS - usuario ======*/
	public function RetornarComentariosUsuario($usuario){
		return $this->retornaComentarioUsuarioTodos($usuario);
	}

	/*===== CONTAR COMENTARIOS - juego ======*/
	public function RetornarCantidadComentarios($juego){
		$Llistat = $this->retornaComentariosJuegoVisibles($juego);
		return count($Llistat);
	}

	/*===== VER COMENTARIOS USUARIO ======*/
	public function ListaComentariosUsuario($usuario){
		$listaCom = $this->retornaComentarioUsuarioTodos($usuario);
		require "../../vistas/juego/comentario/comentario-usuario.php";
	}

	/*===== VER COMENTARIOS todos ======*/
	public function ListaComentariosTodos(){
		$listaComTodos = $this->retornaComentariosTodos();
		require "../../vistas/juego/comentario/comentario-usuario.php";
	}


	/*===== DESHABILITAR COMENTARIO ======*/

	/*envia la peticion*/
	public function SwitchComentario($id, $estado){
		$this->ResultadoSwitch($this->modificaActivo($id, $estado));
	}

	/*muestra el resultado*/
	public function ResultadoSwitch($resultat){
		if ($resultat){
			return true;
		}else{
			return false;
		}
		exit;
	}





}


/*=============================================
=                  Operaciones                =
=============================================*/

/*===== VER FORMULARIO comentarios ======*/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
	$objecte = new ComentariosController();
	$objecte->LlistaUsuarios();
}

/*===== AÑADIR COMENTARIO ======*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addComentario"){
	if (isset($_POST["titulo"]) && isset($_POST["descripcion"])){
		if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"])){

			$existe = new ComentariosController();
			$a = $existe->ComprobarComentario($_SESSION["idUsuario"], $_POST["id"]);

			if(empty($a)){
				$comm = new ComentariosController();
				$comm->AddComentario($_POST["id"], $_SESSION["idUsuario"], $_POST["titulo"], $_POST["descripcion"]);

				$comm2 = new ComentariosController();
				$qtt = $comm2->RetornarComentariosUsuario($_SESSION["idUsuario"]);

				$qtt = count($qtt);
				$user = new UsuariosController();	
				$user->DevuelveNivelComentarios($qtt, $_SESSION["idUsuario"]);

			}else{
				$obj = new JuegosController();
				$obj->DetalleJuego($_POST["id"]);
			}

		}else{
			echo "Faltan datos";
        //header ("location: ../../index.php");
		}
	}else{
		echo "Operacion No permitida";
	}
}

/*===== AÑADIR COMENTARIO ======*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="addComentarioTodo"){
	if (isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["op_comment_1"]) && isset($_POST["op_comment_2"]) && isset($_POST["op_comment_3"]) && isset($_POST["op_comment_4"]) && isset($_POST["op_comment_5"]) && isset($_POST["op_comment_6"])){
		if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["op_comment_1"]) && !empty($_POST["op_comment_2"]) && !empty($_POST["op_comment_3"]) && !empty($_POST["op_comment_4"]) && !empty($_POST["op_comment_5"]) && !empty($_POST["op_comment_6"])){

			$existe = new ComentariosController();
			$a = $existe->ComprobarComentario($_SESSION["idUsuario"], $_POST["id"]);

			if(empty($a)){
				$comm = new ComentariosController();
				// $comm->AddComentario($_POST["id"], $_SESSION["idUsuario"], $_POST["titulo"], $_POST["descripcion"], $_POST["op_comment_1"], $_POST["op_comment_2"], $_POST["op_comment_3"], $_POST["op_comment_4"], $_POST["op_comment_5"], $_POST["op_comment_6"]);

				$qtt = $comm->RetornarComentariosUsuario($_SESSION["idUsuario"]);

				$user = new UsuariosController();	
				$user->DevuelveNivelComentarios($qtt, $_SESSION["idUsuario"]);

			}else{
				$obj = new JuegosController();
				$obj->DetalleJuego($_POST["id"]);
			}

		}else{
			echo "Faltan datos";
        //header ("location: ../../index.php");
		}
	}else{
		echo "Operacion No permitida";
	}
}

/*===== DESHABILITAR COMENTARIO ======*/
if(isset($_POST['quickVarCom']) && isset($_POST['id'])){
    $user = $_POST['id'];
    $quickVarCom = $_POST['quickVarCom'];

    if($quickVarCom == 'deshabilitado'){
        $estado = 0;
    }else{
        $estado = 1;
    }

    $comentario = new ComentariosController();
    $res = $comentario->SwitchComentario($_POST["id"], $estado);

    echo $quickVarCom;
}

?>