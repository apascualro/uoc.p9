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

<!-- titulo -->
<form id="form" action="../../controladores/valoracionesController.php" method="POST">
	<div class="col-md-6 mb-3">
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-primary active">
				<input type="radio" name="options" id="option1" autocomplete="off" checked> 1<span class="glyphicon glyphicon-unchecked unchecked"></span> <span class="glyphicon glyphicon-check checked"></span>
			</label>
			<label class="btn btn-primary">
				<input type="radio" name="options" id="option2" autocomplete="off"> 2<span class="glyphicon glyphicon-unchecked unchecked"></span> <span class="glyphicon glyphicon-check checked"></span>
			</label>
			<label class="btn btn-primary">
				<input type="radio" name="options" id="option3" autocomplete="off"> 3<span class="glyphicon glyphicon-unchecked unchecked"></span> <span class="glyphicon glyphicon-check checked"></span>
			</label>
			<label class="btn btn-primary">
				<input type="radio" name="options" id="option4" autocomplete="off"> 4<span class="glyphicon glyphicon-unchecked unchecked"></span> <span class="glyphicon glyphicon-check checked"></span>
			</label>
			<label class="btn btn-primary">
				<input type="radio" name="options" id="option5" autocomplete="off"> 5<span class="glyphicon glyphicon-unchecked unchecked"></span> <span class="glyphicon glyphicon-check checked"></span>
			</label>
		</div>
	</div>

</form>
