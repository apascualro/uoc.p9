<?php 
/*controladores*/
$controladores  = array('imagenes', 'valoraciones', 'comentarios');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

// /*sesion*/
$objecteSessio = new SesionesController(); 
if(isset($_SESSION['idJuego']) && isset($_SESSION['idUsuario'])){
	$u = $_SESSION['idUsuario'];
	$j = $_SESSION['idJuego']; 
}
?>

<html>
<body>
	<?php 	
	if (file_exists("../vistas/home/header/header.php")){
		include "../vistas/home/header/header.php";
	}
	if (file_exists("../home/header/header.php")){
		include "../home/header/header.php";
	}
	?>
	<section>	
		<?php foreach($propiedadesJuego as $propiedad){ 
			?>
			<div class="container-fluid">
				<div class="row mt-5">
					<div class="col-2"></div>				

					<div class="col-8">
						<span><h3>Juego</h3>
							<h5><?php echo $propiedad->nombre; ?></h5>
						</span>
						<span><p><?php echo $propiedad->subtitulo; ?></p></span>
						<span><p ><?php echo $propiedad->valoracion; ?></p></span>
						<h3>Detalles</h3>
						<span><p ><?php echo $propiedad->descripcion; ?></p></span>
						<span><p ><?php echo $propiedad->autor; ?></p></span>
						<span><p ><?php echo $propiedad->year; ?></p></span>
						<span><p ><?php echo $propiedad->distribuidora; ?></p></span>
						<span><p ><?php echo $propiedad->edad; ?></p></span>
						<span><p ><?php echo $propiedad->tiempo; ?></p></span>
						<span><p ><?php echo $propiedad->medidas; ?></p></span>

						<?php   
						$objecte = new ImagenesController();
						$objecte->LlistaImagenes($propiedad->idJuego); 

						// $objecte2 = new ValoracionesController();
						// $objecte2->LlistaValoraciones($propiedad->idJuego);

						$objecte4 = new ComentariosController();
						$com = $objecte4->ComprobarComentario($u, $j);

						$objecte3 = new ComentariosController();

						if(isset($com) && !empty($com)){
							$objecte3->LlistaComentariosJuego($propiedad->idJuego, $com->idComentario);
						}else{
							$objecte3->LlistaComentariosJuegoNo($propiedad->idJuego);	
						}
						if(isset($com) && !empty($com)){
							echo'
							<div class="">
							<h3>Tu comentario</h3>
							<p class="text-primary">'. $com->titulo .'</p>				
							<p>'. $com->descripcion. '</p>
							</div>
							<hr class="mb-3">';							
						}
						if (isset($_SESSION["mensajeComentario"])){
							echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeComentario"]."</span></div></div>";
							unset($_SESSION["mensajeComentario"]);
						};
						?>

						<?php if (file_exists("../vistas/juego/valoracion/valoracion-add.php")){
							include "../vistas/juego/valoracion/valoracion-add.php";
						} ?>
						
						<?php 
						if(!isset($com) || empty($com)){
							echo '<div class="col-12 mg-0 auto mb-5">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Añadir comentario</button>
							</div>';
						}
						unset($com);?>						

						


					</div>

					<div class="col-2"></div>
				</div>
			</div>
		<?php } ?>
	</section>

	<!-- Modal -->
	<?php 
	if (file_exists("../vistas/juego/comentario/comentario-add.php")){
		include "../vistas/juego/comentario/comentario-add.php";
	}
	?>
	<!--  -->

	<!-- Footer -->
	<?php 
	if (file_exists("../vistas/home/footer/footer.php")){
		include "../vistas/home/footer/footer.php"; 
	}
	if (file_exists("../../vistas/home/footer/footer.php")){
		include "../../vistas/home/footer/footer.php"; 
	}
	?>
	<!--  -->




</body>
</html>