<?php 
/*controladores*/
$controladores  = array('imagenes', 'juegos', 'valoraciones');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

?>

<div class="container">
	<div class="d-flex  p-2 flex-sm-row flex-column text-white flex-wrap">		

		<?php foreach ($LlistatJue as $juego) {?>

			<div class="card m-3 " >
				<!-- Card image -->
				<?php $objecte = new ImagenesController();
				$img = $objecte->ImagenPortada($juego->idJuego); ?>

				<div class="view overlay m-0 img-gallery ">
					<img class="card-img-top m-auto" src="assets/img/<?php echo $img;?>" alt="Card image cap">
					<?php   

					?>
				</div>

				<!-- Card content -->
				<div class="card-body overflow-hidden">

					<!-- Category & Title -->
					<h5 class="card-title mb-1">
						<strong>
							<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>" class="dark-grey-text"><?php echo $juego->nombre ?>
							
						</a>
					</strong>
				</h5>

				<p class="text-muted mt-3"><?php echo $juego->subtitulo; ?></p>

				<!-- Card footer -->
				<div class="card-footer pb-0">	
					<div class="row mb-0 text-dark float-left mr-2">
						<span>
							<strong><?php echo round($juego->valoracion, 1); ?></strong>
						</span>
					</div>							

					<div class="row mb-0 text-dark float-right">
						<span class="">
							<ul class="rating text">
								<li><i class="fas fa-star blue-text"></i></li>
								<li><i class="fas fa-star blue-text"></i></li>
								<li><i class="fas fa-star blue-text"></i></li>
								<li><i class="fas fa-star blue-text"></i></li>
								<li><i class="fas fa-star blue-text"></i></li>

							</ul>
						</span>
						<span class="font-italic text-muted ml-2">
							(<?php $objecte2 = new ValoracionesController();
								$qt = $objecte2->CantidadValoraciones($juego->idJuego);
								echo count($qt); ?>)
							</span>			
						</div>		

					</div>

				</div>
				<!-- Card content -->			
			</div>	
		<?php } ?>

	</div>
	<!-- Card -->
</div>

