<?php    
/***  ENCABEZADO */

if (file_exists("controladores/valoracionesController.php")){
	require_once "controladores/valoracionesController.php";
}
if (file_exists("../controladores/valoracionesController.php")){
	require_once "../controladores/valoracionesController.php";
}
if (file_exists("../../controladores/valoracionesController.php")){
	require_once "../../controladores/valoracionesController.php";
}
?>
<h4>Valoraciones</h4>

<div class="container-fluid">
	<div class="">
		<?php foreach($LlistatVal as $valoracion){ ?>

			<div class="">
			<p><?php echo $valoracion->puntuacion; ?></p>				

			</div>
			


		<?php } ?>
	</div>

</div>
