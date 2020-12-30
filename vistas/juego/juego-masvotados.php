<?php 

$v = new ValoracionesController();
$valTodas = $v->RetornarTodasValoraciones();

?>

<div class="row bg-light2">
	<div class="container mt-5">

		<div class="row ">

			<div class="col-12  mb-2">	
				<h2>MÁS VOTADOS</h2>
				<hr>	
			</div>
		</div>

		<div class="d-flex p-2 flex-sm-row flex-column text-white flex-wrap justify-content-between">		

			<?php foreach ($valTodas as  $juego) {?>			

				<!-- Card Juego -->
				<div class="card mx-2 my-4 cardJuego" data-category="<?php echo $juego->tipo. ' '. $juego->categoria. ' '. $juego->tematica;?>" >

					<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->juego; ?>" >

						<!-- Card image -->
						<?php $objecte = new ImagenesController();
						$img = $objecte->ImagenPortada($juego->juego); ?>

						<div  class="view m-0 img-gallery " >

							<?php if($img){ ?>
								<div class="w-75 py-3 m-auto overflow-hidden">
									<img class="m-auto" src="assets/img/<?php echo $img;?>" alt="Card image cap">
								</div>

							<?php }else{ ?>
								<img class="m-auto noPicture" src="assets/img/empty_file.jpg" alt="Card image cap" >
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
										$qt = $objecte2->CantidadValoraciones($juego->juego);
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

			<?php } ?>

		</div>
		<!-- Card -->
	</div>
</div>