<?php    
/***  ENCABEZADO */

    //require '';

?>
<h1>TODOS los Juegos</h1>

<div class="container-fluid">
	<div class="d-flex">
		<?php foreach($Llistat as $juego){ ?>

			<div class=" h-100 w-100 bg-light m-4">
				<h4><?php echo $juego->nombre; ?></h4>
				<a ><?php echo $juego->subtitulo; ?></a>	
			</div>
			


		<?php } ?>
	</div>
</div>
<br>
<a href="../index.php">Inicio</a>

<?php    
/***  PIE */

?>