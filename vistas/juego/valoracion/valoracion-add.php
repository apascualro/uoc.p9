<?php    

if (file_exists("controladores/valoracionesController.php")){
	require_once "controladores/valoracionesController.php";
}
if (file_exists("../controladores/valoracionesController.php")){
	require_once "../controladores/valoracionesController.php";
}
if (file_exists("../../controladores/valoracionesController.php")){
	require_once "../../controladores/valoracionesController.php";
}
?>

<div id="mensajeVal">
	<p id="valSaved" style="display: none;">Tus cambios se han guardado </p>
</div>
<!-- titulo -->
<form id="form"  method="POST">
	<div class="col mb-3 radioval">
		<div class="" data-toggle="buttons">
			<label class="btn btn-info btn-primary mr-2 active">
				<input type="radio" name="options" id="option0" autocomplete="off" value="0"> 0
				<input type="hidden" name="operacio" value="addValoracion">
			</label>
			<label class="btn btn-info mr-2 active">
				<input type="radio" name="options" id="option1" autocomplete="off" value="1"> 1
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option2" autocomplete="off" value="2"> 2
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option3" autocomplete="off" value="3"> 3
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option4" autocomplete="off" value="4"> 4
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option5" autocomplete="off" value="5"> 5
			</label>
			<label class="btn btn-info mr-2 active">
				<input type="radio" name="options" id="option6" autocomplete="off" value="6"> 6
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option7" autocomplete="off" value="7"> 7
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option8" autocomplete="off" value="8"> 8
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option9" autocomplete="off" value="9"> 9
			</label>
			<label class="btn btn-info mr-2">
				<input type="radio" name="options" id="option10" autocomplete="off" value="10"> 10
			</label>
		</div>
		
		<input type="hidden" id="operacio" name="operacio" value="addValoracion">
	</div>

</form>

<script>
	$('input[name=options]').change(function(){		
		var options = $("input[type=radio]:checked").val();
		var op = "addValoracion";

		$.post("valoracionesController.php", 
			{ operacio: op, options: options },
			);
		$(valSaved).show(700);
		$(valSaved).delay(3000).hide(700);
	});


</script>

