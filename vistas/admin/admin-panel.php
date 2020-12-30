<?php 
/*controladores*/
$controladores  = array('sesiones', 'usuarios', 'comentarios');
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
						$_SESSION["navActivo"] = "datos";

						include '../home/header/navbar-admin.php';
						?>
					</div>

					<div class="row mt-5">
						<?php
						$objecte = new UsuariosController();
						$objecte->PerfilAdmin();
						?>
						<div class="col-12 text-center mt-3">
							<a href="admin-panelModificarPerfil.php" class="btn btn-success m-auto">Modificar mis datos</a>
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