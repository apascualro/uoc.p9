<?php 

/*controladores*/
$controladores  = array('categoria', 'tipo', 'tematica');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}


$obj = new CategoriaController();
$categoria = $obj->LlistaCategorias();

$obj2 = new TipoController();
$tipos = $obj2->LlistaTipos();

$obj3 = new TematicaController();
$tematicas = $obj3->LlistaTematicas();

?>


<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light mt-5 text-uppercase p-0 ">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>


		<div class="collapse navbar-collapse filtros " id="navbarTogglerDemo">

			<div class="row p-0">
				<div class="col-12">
					<ul class="navbar-nav m-auto mt-2 mt-lg-0">
						<li class="nav-item pr-5">
							<a data-toggle="collapse" data-target="#multiCollapse1" role="button" aria-expanded="false" >Categoria</a>
						</li>
						<li class="nav-item pr-5">
							<a data-toggle="collapse" data-target="#multiCollapse2" aria-expanded="false" role="button">Temática</a>
						</li>
						<li class="nav-item pr-5">
							<a data-toggle="collapse" data-target="#multiCollapse3" aria-expanded="false" role="button">Tipo</a>
						</li>

					</ul>

				</div>
			</div>

		</div>
	</nav>
</div>


<div id="myGroup">
	<div class="accordion-group">
		<nav class="navbar navbar-expand-lg navbar-light collapse" id="multiCollapse1" data-parent="#myGroup">
			<div class="row m-auto">
				<div class="col">

					<ul class="navbar-nav m-auto mt-lg-0">

						<?php foreach ($categoria as $key => $value) { 
							if (file_exists('../../vistas/juego/juego-gallery.php')){ 
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){$gallery = '/vistas/juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=categoria&id='.$value->nombre;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value->nombre ?></a>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</nav>

		<nav class="navbar navbar-expand-lg navbar-light collapse multi-collapse" id="multiCollapse2" data-parent="#myGroup">
			<div class="row m-auto">
				<div class="col">

					<ul class="navbar-nav m-auto mt-lg-0">

						<?php foreach ($tipos as $key2 => $value) { 
							if (file_exists('../../vistas/juego/juego-gallery.php')){ 
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){
								$gallery = '/vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value->nombre ?></a>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-light collapse multi-collapse" id="multiCollapse3" data-parent="#myGroup">
			<div class="row m-auto">
				<div class="col">

					<ul class="navbar-nav m-auto mt-lg-0">

						<?php foreach ($tematicas as $key2 => $value) { 
							if (file_exists('../../vistas/juego/juego-gallery.php')){ 
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){
								$gallery = '/vistas/juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=tipo&id='.$value->nombre;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value->nombre ?></a>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>

