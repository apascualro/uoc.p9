
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
	

	<section class="admin pt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-1"></div>				

				<div class="col-10">
					<?php if (isset($_SESSION["mensajeResultado"])){
						echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
						unset($_SESSION["mensajeResultado"]);
					};
					?>
					<div class="row">
						<div class="col-12">
							<h2 >CONFIGURACION PERSONAL - administrador</h2>
							<hr class="border" />	
						</div>
						
						<?php
						include '../../controladores/juegosController.php'; 
						$objecte = new JuegosController();
						$objecte->LlistaJuegosPerfil();
						?>


					</div>

				</div>
				<div class="col-1"></div>
			</div>

		</div>
	</section>



	<?php 
	if (file_exists("../vistas/footer/footer.php")){
		include "../vistas/footer/footer.php"; 
	}
	if (file_exists("../../vistas/footer/footer.php")){
		include "../../vistas/footer/footer.php"; 
	}
	?>
</body>
</html>