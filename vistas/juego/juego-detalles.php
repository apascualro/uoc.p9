<?php 
/*controladores*/
$controladores  = array('imagenes', 'valoraciones', 'comentarios', 'usuarios');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

// /*sesion*/
$objecteSessio = new SesionesController(); 

isset($_SESSION['idJuego']) ? $j = $_SESSION['idJuego']: false; 

isset($_SESSION['idUsuario']) ? $u = $_SESSION['idUsuario'] : false;


if (file_exists("../vistas/home/header/header.php")){
	include "../vistas/home/header/header.php";
}
if (file_exists("../home/header/header.php")){
	include "../home/header/header.php";
}

$coments = new ComentariosController();
$qtt = $coments->RetornarCantidadComentarios($_SESSION['idJuego']);

?>
<section>	
	<?php foreach($propiedadesJuego as $propiedad){ 
		?>
		<div class="container">
			<div class="row mt-5">			

				<div class="col-7 juegoClass">

					<h1 class="text-uppercase"><?php echo $propiedad->nombre; ?></h1>

					<span><?php echo $propiedad->subtitulo; ?></span>

					<hr class="mt-0 mb-4 border-2">

					<div>

						<span class="border reqPuntos text-center mb-3">
							<h2 class="mt-4"><?php echo round($propiedad->valoracion,1);?></h2>

							<p class="pb-3 font-italic">
								<?php 						
								$objecte2 = new ValoracionesController();
								$qt = $objecte2->CantidadValoraciones($j);
								echo "(".count($qt)." votos)"; 
								?>								
							</p>

						</span>

					</div>
					<div class="mt-5">
						<h4 class="">DESCRIPCIÓN</h4>
						<p>
							<?php echo $propiedad->descripcion; ?>
						</p>
					</div>
				</div>

				<div class="col-5">
					<?php $objecte = new ImagenesController();
					$img = $objecte->ImagenPortada($propiedad->idJuego); ?>
					<div class="portadaDet overflow-hidden">
						<img src="../vistas/assets/img/<?php echo $img ?>">
					</div>

				</div>


				<div class="col-12">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs justify-content-center " id="myTab" role="tablist">
						<li class="nav-item" >
							<a class="nav-link active" id="detalles-tab" data-toggle="tab" href="#detalles" role="tab" aria-controls="detalles" aria-selected="true"><h3 class="font-weight-bold pt-3 mb-5">Detalles</h3></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="imagenes" aria-selected="false"><h3 class="font-weight-bold pt-3 mb-5">Imàgenes </h3></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="comentarios-tab" data-toggle="tab" href="#comentarios" role="tab" aria-controls="comentarios" aria-selected="false"><h3 class="font-weight-bold pt-3 mb-5">Comments <span class="badge grey"><?php echo $qtt ?></span></h3></a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content detalls p-0">
						<div class="tab-pane active" id="detalles" role="tabpanel" aria-labelledby="Detalles-tab">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-4">
									<span>Autor
										<p><?php echo $propiedad->autor; ?></p>
									</span>
									<span>Año
										<p ><?php echo $propiedad->year; ?></p>
									</span>
									<span>Editorial
										<p ><?php echo $propiedad->distribuidora; ?></p>
									</span>
									<span>Edad de juego
										<p ><?php echo $propiedad->edad; ?></p>
									</span>
									<span>Tiempo de juego
										<p ><?php echo $propiedad->tiempo; ?></p>
									</span>
									<span>Numero de jugadores
										<p ><?php echo $propiedad->num_jugadores; ?></p>
									</span>
								</div>
								<div class="col-4">
									<span>Medidas
										<p ><?php echo $propiedad->medidas; ?></p>
									</span>
									<span>Complejidad
										<p ><?php echo $propiedad->complejidad; ?></p>
									</span>
									<span>Tipo
										<p ><?php echo $propiedad->tipo; ?></p>
									</span>
									<span>Categoria
										<p ><?php echo $propiedad->categoria; ?></p>
									</span>
									<span>Tematica
										<p ><?php echo $propiedad->tematica; ?></p>
									</span>
								</div>
								<div class="col-6"></div>
							</div>								

						</div>

						<div class="tab-pane" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
							<?php  
							$objecte = new ImagenesController();
							$objecte->LlistaImagenes($propiedad->idJuego); 
							?>

						</div>

						<div class="tab-pane" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">

							<?php   
							if(isset($u, $j)){
								$objecte4 = new ComentariosController();
								$com = $objecte4->ComprobarComentario($u, $j);
							}

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
						</div>
					</div>

					<?php 
					if (file_exists("../vistas/juego/valoracion/valoracion-add.php")){
						include "../vistas/juego/valoracion/valoracion-add.php";
					} ?>


					<?php 
					//añadir comentario modal
					if(isset($_SESSION['idUsuario']) && !empty($_SESSION['idUsuario'])){
						if(!isset($com) || empty($com)){
							echo '<div class="col-12 mg-0 auto mb-5">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Añadir comentario</button>
							</div>';
						}
						unset($com);
					}else{
						echo "<div class='float-right'><p>Inicia sesión para añadir un comentario</p></div>";
					}
					?>			


				</div>

				<div class="col-2"></div>
			</div>
		</div>
	<?php } ?>
</section>


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

<script>
	$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>