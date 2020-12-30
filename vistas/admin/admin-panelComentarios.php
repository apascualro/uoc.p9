<?php 
/*controladores*/
$controladores  = array('sesiones', 'comentarios');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}
/*sesion*/
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
						$_SESSION["navActivo"] = "comentarios";
						include '../home/header/navbar-admin.php';

						$objecte = new ComentariosController();
						if($_SESSION["esAdmin"]){							
							$objecte->ListaComentariosTodos();
						}else{
							$objecte->ListaComentariosUsuario($_SESSION['idUsuario']);
						}

						?>

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