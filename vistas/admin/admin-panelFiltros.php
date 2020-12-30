<?php 
/*modelos y controladores*/
$modelos  = array( array('tipo'=>"controladores",'nombre'=>"sesiones"), array('tipo'=>"controladores",'nombre'=>"tipo"), array('tipo'=>"controladores",'nombre'=>"categoria"),array('tipo'=>"controladores",'nombre'=>"tematica"));

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
					$_SESSION["navActivo"] = "filtros";
					include '../home/header/navbar-admin.php';
					?>
					<?php  
					if (isset($_SESSION["msgAddFiltro"])){
						echo "><div class='col-12 alert alert-success'><span class='msg'>".$_SESSION["msgAddFiltro"]."</span></div>";
						unset($_SESSION["msgAddFiltro"]);
					};

					if (isset($_SESSION["msgErrAddFiltro"])){
						echo "<div class='col-12 alert alert-danger'><span class='msg'>".$_SESSION["msgErrAddFiltro"]."</span></div>";
						unset($_SESSION["msgErrAddFiltro"]);
					};

					?>
					
					<div class="col-12 mt-3">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tipo</a>

							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Categoria</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tematica</a>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<?php 
								$a = new TipoController();
								$a->LlistaTiposEdit(); 
								?> 
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<?php 
								$a = new CategoriaController();
								$a->LlistaCategoriasEdit(); 
								?> 
							</div>
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">								
								<?php 
								$a = new TematicaController();
								$a->LlistaTematicasEdit(); 
								?> 
							</div>
						</div>
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

<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>