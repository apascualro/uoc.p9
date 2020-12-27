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
		<div class="container mb-5">
			<div class="row">
				<div class="col-1"></div>				

				<div class="col-10">
					
					<form id="form-addUser" action="../../controladores/usuariosController.php" method="POST" onsubmit="return validateForm()">
						<div class="row">
							<div class="col-12">
								<h2 >CONFIGURACION PERSONAL - administrador</h2>
								<hr class="border" />	
							</div>

							<?php
							$_SESSION["navActivo"] = "usuarios";
							include '../home/header/navbar-admin.php';
							include '../../controladores/usuariosController.php'; ?>


							<h3 class="col-12 mb-2 ">Añadir usuario</h3>
							<div class="col-10 mt-2">
								<?php 	
								$objecte = new UsuariosController();
								$objecte->MostrarAddUser();
								?>
							</div>					

						</div>
						
<!-- 						<div class="col-12 mt-3 mb-5 text-right">
							<a href="javascript:history.go(-1)" class="btn btn-outline-danger">Cancelar</a>
							<input type="hidden" name="id" value="<?php echo $_SESSION["idJuego"]?>">
							<input type="hidden" name="operacio" value="addJuego">
							<input type="submit" value="Añadir juego" class="btn btn-success ml-1">
						</div> -->

					</form>
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
	}?>
</body>
</html>