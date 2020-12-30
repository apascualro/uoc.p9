<?php 	

$j = new JuegosController();
$nuevo = $j->JuegoNuevo();


$i = new ImagenesController();
$img = $i->ImagenPortada($nuevo['idJuego']);

$objecte2 = new ValoracionesController();
$qt = $objecte2->CantidadValoraciones($nuevo['idJuego']);


?>


<div class="container mt-4 mb-3">
	<div class="row">

		<div class="col-12  mb-2">	
			<h2>NOVEDADES</h2>
			<hr>	
		</div>

		<div class="col-md-6 col-sm-12 mt-3">
			<div class="border overflow-hidden nuevoImg " style="height: 300px;">
				<img class="img-responsive center-block" src="assets/img/productos/<?php echo $img?>" >
			</div>
		</div>	

		<div class="col-md-1 mt-3"></div>

		<div class="col-md-5 col-sm-12 mt-3">


			<h3 class="font-weight-bold"><?php echo $nuevo['nombre'] ?></h3>
			<p class="mt-2 mb-4 mr-2">
				<?php echo $nuevo['descripcion'] ?>
			</p>

			<div class="d-block">
				<span class="score">
					<div class="score-wrap mt-3">
						<span class="stars-active" style="width:<?php echo $nuevo['valoracion'] * 10; ?>%">
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

						<span class="font-italic text-muted ml-2 float-right">(
							<?php echo count($qt);?>
							)
						</span>	
					</div>
					
				</span>
				
			</div>		


			<div class="mb-0 mt-5 text-secondary font-italic float-right">
				<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $nuevo['idJuego']; ?>">ver más</a>
			</div>
		</div>
	</div>
</div>
