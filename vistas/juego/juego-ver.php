<?php 
/*controladores*/
$controladores  = array('imagenes', 'juegos');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}
?>


<h1>TODOS los Juegos</h1>

<div class="container-fluid">
	<div class="d-flex">
		<?php foreach($LlistatJue as $juego){ ?>

			<div class=" h-200 border border-lighten-4 rounded  m-4">
				<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>">
					<?php   
					$objecte = new ImagenesController();
					$img = $objecte->ImagenPortada($juego->idJuego);
					?>
					
					<div class="col-md-6 m-auto">
						<img style="width: 150px;" src="assets/img/<?php echo $img;?>">

						<h3><?php echo $juego->nombre; ?></h3>

						<div class="text-center">
							<p ><?php echo $juego->subtitulo; ?></p>
						</div>
					</div>
					

					
				</a>
			</div>
			


		<?php } ?>
	</div>
</div>


<?php    
/***  PIE */

?>