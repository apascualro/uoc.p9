<?php 
/*controladores*/
$controladores  = array('sesiones', 'juegos', 'imagenes');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}
$objecteSessio = new SesionesController(); 
?>


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
					};//../../controladores/juegosController.php
					?>

					<form id="fupForm" action="../../controladores/juegosController.php" method="POST">
						<div class="row">
							<div class="col-12">
								<h2 >CONFIGURACION PERSONAL - administrador</h2>
								<hr class="border" />	
							</div>
							<?php
							$_SESSION["navActivo"] = "juegos";
							include '../home/header/navbar-admin.php';
							$objecte = new JuegosController();
							$objecte->MostrarAddJuego();

							?>
							<div class="col-12 mt-3 mb-5">
								<?php 
								$objecte2 = new ImagenesController();
								$objecte2->MostrarImagenUpload();
								?>
							</div>	

						</div>


						
						<div class="col-12 mt-3 mb-5 text-right">
							<a href="javascript:history.go(-1)" class="btn btn-light">Cancelar</a>
							<input type="hidden" name="id" value="<?php echo $_SESSION["idJuego"]?>">
							<input type="hidden" name="operacio" value="addJuego">
							<input type="hidden" name="operacio2"  value="fotus"/>
								<input type="submit" value="Añadir juego" name="submit" class="btn btn-success ml-1">
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
