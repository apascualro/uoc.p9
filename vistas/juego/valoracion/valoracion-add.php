<?php    

/*controladores*/
$controladores  = array('valoraciones', 'juegos');
foreach ($controladores as $key) {
	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";
	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}
/**/
if(isset($_SESSION["idUsuario"])){
	$objecte = new ValoracionesController();
	$p = $objecte->comprobarValoracion($_SESSION["idJuego"], $_SESSION["idUsuario"]);

?>


<div id="mensajeVal">
	<p id="valSaved" style="display: none;">Tu valoracion se ha guardado </p>
	<p id="valUpdated" style="display: none;">Tus cambios se han guardado </p>
</div>
<!-- titulo -->
<form id="form"  method="POST">
	<div class="col mb-3 radioval">
		<div class="" data-toggle="buttons">
			<label class="btn btn-info btn-primary mr-2 active">
				<input type="radio" name="options" id="option0" autocomplete="off" <?php echo $p == "0" ?  "checked" : ""   ?> value="0"> 0
			</label>
			<label class="btn btn-info mr-2 active">
				<input type="radio" name="options" id="option1" autocomplete="off" <?php echo $p == "1" ?  "checked" : ""   ?> value="1"> 1
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option2" autocomplete="off" <?php echo $p == "2" ?  "checked" : ""   ?> value="2"> 2
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option3" autocomplete="off" <?php echo $p == "3" ?  "checked" : ""   ?> value="3"> 3
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option4" autocomplete="off" <?php echo $p == "4" ?  "checked" : ""   ?> value="4"> 4
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option5" autocomplete="off" <?php echo $p == "5" ?  "checked" : ""   ?> value="5"> 5
			</label>
			<label class="btn btn-info mr-2 active">
				<input type="radio" name="options" id="option6" autocomplete="off" <?php echo $p == "6" ?  "checked" : ""   ?> value="6"> 6
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option7" autocomplete="off" <?php echo $p == "7" ?  "checked" : ""   ?> value="7"> 7
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option8" autocomplete="off" <?php echo $p == "8" ?  "checked" : ""   ?> value="8"> 8
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option9" autocomplete="off" <?php echo $p == "9" ?  "checked" : ""   ?> value="9"> 9
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option10" autocomplete="off" <?php echo $p == "10" ?  "checked" : ""   ?> value="10"> 10
			</label>
		</div>
		<input type="hidden" id="operacio" name="operacio" value="<?php echo !$p ? "addValoracion" : "updateValoracion" ?>">
	</div>

</form>
<?php } ?>

