<?php    
/*controladores*/
$controladores  = array('valoraciones');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php";
	$nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}
?>

<h4>Valoraciones</h4>

<div class="container-fluid">
	<div class="">
		<?php foreach($LlistatVal as $valoracion){ ?>

			<div class="">
				<p><?php echo "puntuacion: ".$valoracion->puntuacion." , usuario: ".$valoracion->usuario; ?></p>
			</div>
			
		<?php } ?>
	</div>

</div>
