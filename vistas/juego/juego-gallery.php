<?php 
/*controladores*/
$controladores  = array('imagenes', 'valoraciones', 'juegos');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}


if (file_exists("../vistas/home/header/header.php")){
	include "../vistas/home/header/header.php";
}
if (file_exists("../home/header/header.php")){
	include "../home/header/header.php";
}

$filtro = $_GET['filtro'];
$palabra = $_GET['id'];

$obj = new JuegosController();
$objFiltro = $obj->LlistaJuegosFiltro($filtro, $palabra);

?>
<section>
	<div class="container">
		<h3 class="text-dark mt-5">Mostrando juegos de <?php echo $filtro." ". $palabra ?></h3>
		<div class="d-flex  p-2 flex-sm-row flex-column text-white cont-gallery" >
			<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>">

				<?php foreach ($objFiltro as $juego) {?>

					<div class="card m-3 ">

						<!-- Card image -->
						<?php $objecte = new ImagenesController();
						$img = $objecte->ImagenPortada($juego->idJuego); ?>

						<div class="view overlay m-auto img-gallery ">
							<img class="card-img-top" src="../assets/img/<?php echo $img;?>" alt="Card image cap">
							<?php   

							?>
							<a><div class="mask rgba-white-slight"></div>
							</a>
						</div>

						<!-- Card content -->
						<div class="card-body overflow-hidden">

							<!-- Category & Title -->
							<h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?php echo $juego->nombre ?></a></strong></h5>

							<p class="text-muted mt-3"><?php echo $juego->subtitulo; ?></p>

							<!-- Card footer -->
							<div class="card-footer pb-0">	
								<div class="row mb-0 text-dark float-left">
									<span>
										<strong><?php echo round($juego->valoracion, 1) ?></strong>
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
								</div>						

							</div>

						</div>
						<!-- Card content -->	
					</div>	
				<?php } ?>
			</a>
		</div>
		<!-- Card -->
	</section>
	
	<?php 
	if (file_exists("../vistas/home/footer/footer.php")){
		include "../vistas/home/footer/footer.php"; 
	}
	if (file_exists("../../vistas/home/footer/footer.php")){
		include "../../vistas/home/footer/footer.php"; 
	}
	?>