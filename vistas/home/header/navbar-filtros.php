<?php 

/*controladores*/
$controladores  = array('juegos');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

$c = new JuegosController();

$categoria = $c->LlistaFiltros('categoria');
$tipos = $c->LlistaFiltros('tipo');
$tematicas = $c->LlistaFiltros('tematica');


?>
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>


	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse1" role="button" aria-expanded="false" >Categoria</a>
			</li>
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse2" aria-expanded="false" role="button">Temática</a>
			</li>
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse3" aria-expanded="false" role="button">Tipo</a>
			</li>

		</ul>
	</div>
</nav>


<!-- <nav class="navbar navbar-expand-lg navbar-light text-uppercase ">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse filtros border-0 shadow-sm pb-2" id="navbarTogglerDemo" style="background-color: red;">

		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse1" role="button" aria-expanded="false" >Categoria</a>
			</li>
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse2" aria-expanded="false" role="button">Temática</a>
			</li>
			<li class="nav-item pr-5">
				<a class="nav-link" data-toggle="collapse" data-target="#multiCollapse3" aria-expanded="false" role="button">Tipo</a>
			</li>

		</ul>		
	</div>

	
</nav> -->



<div id="myGroup">
	<div class="accordion-group">
		<nav class="navbar navbar-expand-lg navbar-light collapse" id="multiCollapse1" data-parent="#myGroup">
			<div class="row m-auto">
				<div class="col">

					<ul class="navbar-nav m-auto mt-lg-0">

						<?php foreach ($categoria as $key => $value) { 
							if (file_exists('../../vistas/juego/juego-gallery.php')){ 
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=categoria&id='.$value;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){$gallery = '/vistas/juego/juego-gallery.php?filtro=categoria&id='.$value;}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=categoria&id='.$value;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value ?></a>
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
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){
								$gallery = '/vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value ?></a>
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
								$gallery = '../../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('../vistas/juego/juego-gallery.php')){  
								$gallery = '../vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('/vistas/juego/juego-gallery.php')){
								$gallery = '/vistas/juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							if (file_exists('juego/juego-gallery.php')){
								$gallery = 'juego/juego-gallery.php?filtro=tipo&id='.$value;
							}
							?>

							<li class="nav-item px-3">
								<a class="nav-link an-color-text"  href="<?php echo $gallery; ?>"><?php echo $value ?></a>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>

