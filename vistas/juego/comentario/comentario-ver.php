<?php    
/***  ENCABEZADO */

if (file_exists("controladores/comentariosController.php")){
	require_once "controladores/comentariosController.php";
}
if (file_exists("../controladores/comentariosController.php")){
	require_once "../controladores/comentariosController.php";
}
if (file_exists("../../controladores/comentariosController.php")){
	require_once "../../controladores/comentariosController.php";
}
?>
<h3>Comentarios</h3>



<div class="container-fluid">
	<div class="">
		<?php foreach($Llistat as $comentario){ ?>

			<div class="">
			<p class="text-primary"><?php echo $comentario->titulo; ?></p>				
			<p><?php echo $comentario->descripcion; ?></p>
			</div>
			<hr class="mb-3">
			


		<?php } ?>
	</div>
</div>
