<?php 
if (file_exists("controladores/sesionesController.php")){
	require_once "controladores/sesionesController.php";
}
if (file_exists("../controladores/sesionesController.php")){
	require_once "../controladores/sesionesController.php";
}
if (file_exists("../../controladores/sesionesController.php")){
	require_once "../../controladores/sesionesController.php";
}
$objecteSessio = new SesionesController(); 
?>

<html>
<body>
	<?php 	
	if (file_exists("../vistas/header/header.php")){
		include "../vistas/header/header.php";
	}
	if (file_exists("../header/header.php")){
		include "../header/header.php";
	}
	?>


	<section class="admin pt-5">
		<div class="container">
			<div class="row">
				<div class="col-1"></div>				

				<div class="col-10">
					<?php if (isset($_SESSION["mensajeResultado"])){
						echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
						unset($_SESSION["mensajeResultado"]);
					};
					?>
					<form id="form" action="../../controladores/usuariosController.php" method="POST">
						<div class="row">
							<div class="col-12">
								<h2 >CONFIGURACION PERSONAL - administrador</h2>
								<hr class="border" />	
							</div>
							<?php
						// include '../../vistas/header/navbar-admin.php';
							include '../../controladores/usuariosController.php'; 
							$objecte = new UsuariosController();
							$objecte->mostrarModificarAdmin();
							?>

							<input type="hidden" name="id" value="1"> <!-- session id_usuario -->
							<input type="hidden" name="operacio" value="modificarAdmin">

							<div class="col-md-12 mb-3">
								<input type="submit" class="btn btn-success" value="modificarAdmin">
								<a href="admin-panel.php" class="btn btn-light">Cancelar</a>
							</div>

						</div>
					</form>
				</div>

				<div class="col-1"></div>
			</div>

		</div>
	</section>



	<?php 
	if (file_exists("../vistas/footer/footer.php")){
		include "../vistas/footer/footer.php"; 
	}
	?>
</body>
</html>