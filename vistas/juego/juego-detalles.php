<?php 
if (file_exists("controladores/imagenesController.php")){
	require_once "controladores/imagenesController.php";
}
if (file_exists("../controladores/imagenesController.php")){
	require_once "../controladores/imagenesController.php";
}
if (file_exists("../../controladores/imagenesController.php")){
	require_once "../../controladores/imagenesController.php";
}

if (file_exists("controladores/valoracionesController.php")){
	require_once "controladores/valoracionesController.php";
}
if (file_exists("../controladores/valoracionesController.php")){
	require_once "../controladores/valoracionesController.php";
}
if (file_exists("../../controladores/valoracionesController.php")){
	require_once "../../controladores/valoracionesController.php";
}
if (file_exists("controladores/comentariosController.php")){
	require_once "controladores/comentariosController.php";
}
if (file_exists("../controladores/comentariosController.php")){
	require_once "../controladores/comentariosController.php";
}
if (file_exists("../../controladores/comentariosController.php")){
	require_once "../../controladores/comentariosController.php";
}
$objecteSessio = new SesionesController(); 
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
		<h1>a</h1>

		<?php foreach($propiedadesJuego as $propiedad){ 
			?>
			<div class="container-fluid">
				<div class="row mt-5">
					<div class="col-2"></div>				

					<div class="col-8">
						<span>
							<h3>Juego</h3>
							<h5><?php echo $propiedad->nombre; ?></h5>
						</span>
						<span>
							<p><?php echo $propiedad->subtitulo; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->valoracion; ?></p>
						</span>
						<h3>Detalles</h3>
						<span>
							<p ><?php echo $propiedad->descripcion; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->autor; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->year; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->distribuidora; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->edad; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->tiempo; ?></p>
						</span>
						<span>
							<p ><?php echo $propiedad->medidas; ?></p>	
						</span>

						<?php   
						$objecte = new ImagenesController();
						$objecte->LlistaImagenes($propiedad->idJuego); 

						$objecte2 = new ValoracionesController();
						$objecte2->LlistaValoraciones($propiedad->idJuego);

						$objecte3 = new ComentariosController();
						$objecte3->LlistaComentariosJuego($propiedad->idJuego);
						?>

						<?php if (file_exists("../vistas/juego/valoracion/valoracion-add.php")){
							include "../vistas/juego/valoracion/valoracion-add.php";
						} ?>
						
						<div class="col-12 mg-0 auto mb-3">
							<a href="../../controladores/juegosController.php?operacio=add" class="btn btn-info">Añadir comentario</a>
						</div>
					</div>

					<div class="col-2"></div>
				</div>
			</div>
		<?php } ?>
	</section>

	<?php 
	if (file_exists("../vistas/home/footer/footer.php")){
		include "../vistas/home/footer/footer.php"; 
	}
	if (file_exists("../../vistas/home/footer/footer.php")){
		include "../../vistas/home/footer/footer.php"; 
	}
	?>

</body>
</html>