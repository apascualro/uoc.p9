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

				<div class="mt-2">
					<ul class="list-unstyled">
						<li class="comment-date">
							<i class="fas fa-user fa-sm mr-2 float-left mr-2 mt-1" style="color:black"></i><h4 class="font-weight-bold text-dark"><?php echo $nomUsuari ?></h4></li>
					</ul>
					
				</div>

				<h5 class="grey-text"><?php echo $comentario->titulo; ?></h5>

				<p class="grey-text"><?php echo $comentario->descripcion; ?></p>

				<div class="mt-2 float-right">
					<ul class="list-unstyled">
						<li class="comment-date"><i class="fas fa-clock fa-sm mr-2"></i><?php echo $comentario->fecha; ?></li>
					</ul>
				</div>
			</div>

		<?php } ?>
	</div>
	
</div>
