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
			<div class="galImg overflow-hidden" style="width: 300px; height: 300px;">
				<div class="w-75 py-3 m-auto overflow-hidden">
					<img  src="../../vistas/assets/img/productos/<?php echo $imagen->nombre;?>" alt="Card image cap">
				</div>
			</div>

		<?php } ?>
	</div>
</div>


<?php    
/***  PIE */

?>