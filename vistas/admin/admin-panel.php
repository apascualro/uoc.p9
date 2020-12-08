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
	if (file_exists("../vistas/home/header/header.php")){
		include "../vistas/home/header/header.php";
	}
	if (file_exists("../home/header/header.php")){
		include "../home/header/header.php";
	}
	?>
	

	<section class="admin pt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-1"></div>				

				<div class="col-10">

					<div class="row">
						<div class="col-12">
							<h2 >CONFIGURACION PERSONAL - administrador</h2>
							<hr class="border" />	
						</div>
						
						<?php
						$_SESSION["navActivo"] = "datos";
						include '../home/header/navbar-admin.php';
						include '../../controladores/usuariosController.php'; 
						$objecte = new UsuariosController();
						$objecte->PerfilAdmin();
						?>
						<div class="col-12 mg-0 auto">
							<a href="admin-panelModificarPerfil.php" class="btn btn-success">Modificar mis datos</a>
						</div>


					</div>

				</div>
				<div class="col-1"></div>
			</div>

		</div>
	</section>



	<?php 
	if (file_exists("../vistas/home/footer/footer.php")){
		include "../vistas/home/footer/footer.php"; 
	}
	if (file_exists("../../vistas/home/footer/footer.php")){
		include "../../vistas/home/footer/footer.php"; 
	}
	?>
</body>
</html>