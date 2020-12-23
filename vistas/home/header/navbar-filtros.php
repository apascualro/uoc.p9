<?php 

if (file_exists("controladores/categoriaController.php")){
	require_once "controladores/categoriaController.php";
}
if (file_exists("../controladores/categoriaController.php")){
	require_once "../controladores/categoriaController.php";
}
if (file_exists("../../controladores/categoriaController.php")){
	require_once "../../controladores/categoriaController.php";
}

$obj = new CategoriaController();
$categoria = $obj->LlistaCategorias();



?>



<nav class="navbar navbar-expand-lg navbar-light">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<ul class="navbar-nav m-auto mt-2 mt-lg-0">

			<?php foreach ($categoria as $key => $value) { 
				if (file_exists('../../vistas/juego/juego-gallery.php')){ $gallery = '../../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;}
				if (file_exists('../vistas/juego/juego-gallery.php')){  $gallery = '../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;}
				if (file_exists('/vistas/juego/juego-gallery.php')){$gallery = '/vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;}
				if (file_exists('juego/juego-gallery.php')){$gallery = 'juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;
			}
			?>

			<li class="nav-item px-3">
				<a class="nav-link"  href="<?php echo $gallery; ?>"><?php echo $value->nombre ?></a>
			</li>
		<?php } ?>

	</ul>

</div>
</nav>

