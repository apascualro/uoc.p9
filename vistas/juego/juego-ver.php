<?php    
/***  ENCABEZADO */

if (file_exists("controladores/juegosController.php")){
	require_once "controladores/juegosController.php";
}
if (file_exists("../controladores/juegosController.php")){
	require_once "../controladores/juegosController.php";
}
if (file_exists("../../controladores/juegosController.php")){
	require_once "../../controladores/juegosController.php";
}
if (file_exists("controladores/imagenesController.php")){
	require_once "controladores/imagenesController.php";
}
if (file_exists("../controladores/imagenesController.php")){
	require_once "../controladores/imagenesController.php";
}
if (file_exists("../../controladores/imagenesController.php")){
	require_once "../../controladores/imagenesController.php";
}

?>
<h1>TODOS los Juegos</h1>

<div class="container-fluid">
	<div class="d-flex">
		<?php foreach($LlistatJue as $juego){ ?>

			<div class=" h-100 w-100 bg-light m-4">
				<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>">
					<?php   
					$objecte = new ImagenesController();
					$img = $objecte->ImagenPortada($juego->idJuego);
					?>
					<img style="width: 150px;" src="assets/img/<?php echo $img;?>">
					<h4><?php echo $juego->nombre; ?></h4>
					<p ><?php echo $juego->subtitulo; ?></p>	
					
				</a>
			</div>
			


		<?php } ?>
	</div>
</div>


<?php    
/***  PIE */

?>