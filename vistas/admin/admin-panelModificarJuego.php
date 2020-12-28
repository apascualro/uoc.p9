<?php 
/*modelos y controladores*/
$modelos  = array( array('tipo'=>"controladores",'nombre'=>"sesiones"), array('tipo'=>"controladores",'nombre'=>"imagenes"));

foreach ($modelos as $i => $key) {
	$key['tipo']== "modelos" ? $ruta = $key['nombre']."-modelo.php" : $ruta = $key['nombre']."Controller.php";
	$nivel = "../"; $path = $key['tipo']."/". $ruta;

	for ($i=0; $i < 3; $i++) { 
		file_exists($path) ? require_once $path : false;
		$path = $nivel.$path;
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
		<div class="container mb-5">
			<div class="row">
				<div class="col-1"></div>				

				<div class="col-10">
					
					<form id="formJuegoEdit" action="../../controladores/juegosController.php" enctype="multipart/form-data" method="POST">

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
							$objecte->MostrarModificarJuego();
							?>	
							<?php 
							$objecte2 = new ImagenesController();
							$objecte2->MostrarImagenEdit();
							?>
							
						</div>

						<input type="hidden" name="id" value="<?php echo $_SESSION["idJuego"]?>">
						<input type="hidden" name="operacio" value="modifica">
						
						<div class="col-12 mt-3 mb-5 text-right">
							<a href="javascript:history.go(-1)" class="btn btn-light">Cancelar</a>
							
							<input type="submit" class="btn btn-success" value="Modifica el juego">
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