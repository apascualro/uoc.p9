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
		<?php foreach($Llistat as $juego){ ?>

			<div class=" h-100 w-100 bg-light m-4">
				<a href="../../controladores/juegosController.php?operacio=detalles&juego=<?php echo $juego->idJuego; ?>">
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