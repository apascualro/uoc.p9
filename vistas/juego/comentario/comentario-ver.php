<?php    
/*controladores*/
$controladores  = array('usuarios', 'comentarios');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

isset($_SESSION['idJuego']) ? $j = $_SESSION['idJuego']: false; 

isset($_SESSION['idUsuario']) ? $u = $_SESSION['idUsuario'] : false;

$coments = new ComentariosController();
$qtt = $coments->RetornarCantidadComentarios($_SESSION['idJuego']);
?>



<div class="comments-list text-center text-md-left mb-5">

	<div class="row">		
		<?php 
		foreach($Llistat as $comentario){ 

			$objUser = new UsuariosController();
			$nomUsuari = $objUser->NombreUsuarioId($comentario->usuario);

			?>
			<div class="col-sm-10 col-12 mb-4 commentslist">
				<a>
					<h4 class="font-weight-bold"><?php echo $nomUsuari ?></h4>
				</a>
				<div class="mt-2">
					<ul class="list-unstyled">
						<li class="comment-date"><i class="fas fa-clock mr-1"></i><?php echo $comentario->fecha; ?></li>
					</ul>
				</div>
				<p class="grey-text"><?php echo $comentario->descripcion; ?></p>
			</div>

		<?php } ?>
	</div>
	
</div>
