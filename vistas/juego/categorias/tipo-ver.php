<div class="col-10 m-auto">
	<div class="col-12 mg-0 auto text-right">
		<a data-toggle="modal" data-target="#tipoModal" class="btn btn-info">Añadir Tipo de juego</a>
	</div>
	<table class="table">

		<tr class="titulostabla">
			<th>Id</th>
			<th>Nombre</th>     
		</tr>

		<?php foreach ($tiposList as $key => $value) {?>

			<tr >
				<td class="align-middle"><?php echo $value->idTipo ?></td>
				<td class="align-middle"><?php echo $value->nombre ?></td>
				<td class="align-middle text-right" >
					<a class="btn btn-sm btn-dark p-2 m-0" data-val="<?php echo $value->idTipo ?>" data-val2="<?php echo $value->nombre ?>" data-toggle="modal" data-target="#tipoModal2">
						<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" width="20px" height="20px" viewBox="0 0 22 22">
							<path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
							<path d="M0 0h24v24H0z" fill="none"/>
						</svg>
					</a>
				</td> 			 
			</tr>
			<?php
		}?>

	</table>
</div>
<?php 
$array = [];
foreach ($tiposList as $key => $value) {
	array_push($array, $value->nombre);
}
?>

<!-- Modal Add Tipo -->
<div class="modal fade" id="tipoModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" >
	<div class="modal-dialog " role="document"> 
		<div class="modal-content p-4 text-center">

			<form id="form-tipo" action="../../controladores/tipoController.php" method="POST" onsubmit="return validateFiltros()">

				<div class="row">
					<h3 class="col-12 text-left mb-3">Añadir filtro: tipo</h3>

					<!-- Err -->
					<div id="FiltroErr" class="col-9 m-auto alert alert-danger" role="alert" style="display: none;">
						<span style="font-size: 0.9em">Este nombre ya esta en la lista.
						</span>
					</div>          
					<!--  -->

					<div class="col-10 pt-3 m-auto">
						<div class="input-container">
							<input type="text" id="filter" name="filter"  pattern="[A-Za-z].{1,}" title="Formato erroneo" required >
							
							<label for="filter" class="label">Tipo</label>
						</div>
					</div>


					<input type="hidden" name="operacio" value="addTipo">

					<div class="col-12 my-3">
						<input type="submit" class="btn btn-success btn-lg" value="Añadir">
					</div> 
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal login fin -->

<!-- Modal Edit Tipo -->
<div class="modal fade" id="tipoModal2" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" >
	<div class="modal-dialog " role="document"> 
		<div class="modal-content p-4 text-center">

			<form id="form-tipo2" action="../../controladores/tipoController.php" method="POST" onsubmit="return validateFiltros()">

				<div class="row">
					<h3 class="col-12 text-left mb-3">Editar filtro: tipo</h3>

					<!-- Err -->
					<div id="FiltroErr" class="col-9 m-auto alert alert-danger" role="alert" style="display: none;">
						<span style="font-size: 0.9em">Este nombre ya esta en la lista.
						</span>
					</div>          
					<!--  -->

					<div class="col-10 pt-3 m-auto">
						<div class="input-container">
							<input type="text" id="filterupdate" name="filterupdate"  pattern="[A-Za-z].{1,}" title="Formato erroneo" required >
							<input type="hidden" id="id" name="id" >
							
							<label for="filterupdate" class="label">Tipo</label>
						</div>
					</div>


					<input type="hidden" name="operacio" value="updateTipo">

					<div class="col-12 my-3">
						<input type="submit" class="btn btn-success btn-lg" value="Modificar">
					</div> 
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal login fin -->
<script>

 	

	$('#tipoModal').on('show.bs.modal', function (event) {

		array = <?php echo json_encode($array)?>;

		filtro = document.forms["form-tipo"]["filter"].value;

	});


	$('#tipoModal2').on('show.bs.modal', function (event) {

		array = <?php echo json_encode($array)?>;

		myVal = $(event.relatedTarget).data('val');
		$(this).find(".modal-body").text(myVal);
		document.getElementById("id").value = myVal;

		myName = $(event.relatedTarget).data('val2');
		$(this).find(".modal-body").text(myName);
		document.getElementById("filterupdate").value = myName;

		filtro = document.forms["form-tipo2"]["filterupdate"].value;

	});

</script>