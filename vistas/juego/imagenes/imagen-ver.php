<?php    
/***  ENCABEZADO */

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

<div class="container-fluid">
	<div class="d-flex">
		<?php foreach($Llistat as $imagen){ ?>
			<img style="width: 300px; " src="../../vistas/assets/img/<?php echo $imagen->nombre; ?>">			


		<?php } ?>
	</div>
</div>


<?php    
/***  PIE */

?>