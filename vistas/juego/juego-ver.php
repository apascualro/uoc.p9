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

<div class="container mt-4 mb-2">
	<div class="row">
		<div class="col-12  mb-2">	
			<h2>ALGUNOS DE NUESTROS JUEGOS</h2>
			<hr>	
		</div>
		<div class="d-flex p-2 flex-sm-row flex-column text-white flex-wrap justify-content-between">

			<?php
		$LlistatJue =  array_slice($LlistatJue, 0, 8); // get first three only

		foreach ($LlistatJue as $juego) {
			?>


			<!-- Card Juego -->
			<div class="card mx-2 my-4 cardJuego" data-category="<?php echo $juego->tipo. ' '. $juego->categoria. ' '. $juego->tematica;?>" >

				<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>" >

					<!-- Card image -->
					<?php $objecte = new ImagenesController();
					$img = $objecte->ImagenPortada($juego->idJuego); ?>

					<div  class="view m-0 img-gallery " >

						<?php if($img){ ?>
							<div class="w-75 py-3 m-auto overflow-hidden">
								<img class="m-auto" src="assets/img/productos/<?php echo $img;?>" alt="Card image cap">
							</div>

						<?php }else{ 
							if (file_exists('assets/img/empty_file.jpg')){
								$ruta = 'assets/img/empty_file.jpg';
							}
							if (file_exists('../assets/img/empty_file.jpg')){
								$ruta = '../assets/img/empty_file.jpg';
							}
							if (file_exists('../../assets/img/empty_file.jpg')){
								$ruta = '../../assets/img/empty_file.jpg';
							}

							?>
							<img class="m-auto noPicture" src="<?php echo $ruta?>" alt="Card image cap" >
						<?php } ?>

					</div>

					<!-- Card content -->
					<div class="card-body overflow-hidden">

						<!-- Category & Title -->
						<h5 class="card-title mb-1 text-center">
							<strong class="dark-grey-text ">
								<?php echo $juego->nombre ?>
							</strong>
						</h5>

						<p class="text-muted mt-3">
							<?php echo $juego->subtitulo; ?>

						</p>

						<!-- Card footer -->
						<div class="card-footer pb-0">	
							<!-- <div class="row mb-0 text-dark float-left mr-2">
								<span>
									<strong><?php echo round($juego->valoracion, 1); ?></strong>
								</span>
							</div>	 -->						

							<div class="row mb-0 text-dark m-auto">
								<span class="score">
									<div class="score-wrap">
										<span class="stars-active" style="width:<?php echo $juego->valoracion * 10; ?>%">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
										<span class="stars-inactive">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</div>
								</span>
								<span class="font-italic text-muted ml-2 ">(
									<?php $objecte2 = new ValoracionesController();
									$qt = $objecte2->CantidadValoraciones($juego->idJuego);
									echo count($qt); 
									?>
									)
								</span>			
							</div>		

						</div>

					</div>
					<!-- Card content -->				
				</a>		
			</div>
			<!-- Card -->	
		<?php } ?>

	</div>
	

</div>
</div>

