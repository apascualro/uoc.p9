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
					<?php if (isset($_SESSION["mensajeResultado"])){
						echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
						unset($_SESSION["mensajeResultado"]);
					};
					?>
					<form id="form" action="../../controladores/juegosController.php" method="POST">
						<div class="row">
							<div class="col-12">
								<h2 >CONFIGURACION PERSONAL - administrador</h2>
								<hr class="border" />	
							</div>
							<?php
							$_SESSION["navActivo"] = "juegos";
							include '../home/header/navbar-admin.php';
							include '../../controladores/juegosController.php'; 
							$objecte = new JuegosController();
							$objecte->mostrarAddJuego();
							?>					

						</div>
						
						<div class="col-12 mt-3 mb-5 text-right">
							<a href="javascript:history.go(-1)" class="btn btn-outline-danger">Cancelar</a>
							<input type="hidden" name="id" value="<?php echo $_SESSION["idJuego"]?>">
							<input type="hidden" name="operacio" value="addJuego">
							<input type="submit" value="Añadir juego" class="btn btn-success ml-1">
						</div>
						


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