<div class="col-10 m-auto">
	<div class="col-12 mg-0 auto text-right">
		<a data-toggle="modal" data-target="#CategoriaModal" class="btn btn-info">Añadir Categorias de juego</a>
	</div>
	<table class="table">

		<tr class="titulostabla">
			<th>Id</th>
			<th>Nombre</th>     
		</tr>

		<?php foreach ($categoriasList as $key => $value) {?>

			<tr >
				<td class="align-middle"><?php echo $value->idCategoria ?></td>
				<td class="align-middle"><?php echo $value->nombre ?></td>
				<td class="align-middle text-right" >
					<a class="btn btn-sm btn-dark p-2 m-0" data-val="<?php echo $value->idCategoria ?>" data-val2="<?php echo $value->nombre ?>" data-toggle="modal" data-target="#CategoriaModal2">
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
$array3 = [];
foreach ($categoriasList as $key => $value) {
	array_push($array3, $value->nombre);
}
?>

<!-- Modal Add categoria -->
<div class="modal fade" id="CategoriaModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" >
	<div class="modal-dialog " role="document"> 
		<div class="modal-content p-4 text-center">

			<form id="form-categoria" action="../../controladores/categoriaController.php" method="POST" onsubmit="return validateFiltros()">

				<div class="row">
					<h3 class="col-12 text-left mb-3">Añadir filtro: categoria</h3>

					<!-- Err -->
					<div id="FiltroErr" class="col-9 m-auto alert alert-danger" role="alert" style="display: none;">
						<span style="font-size: 0.9em">Este nombre ya esta en la lista.
						</span>
					</div>          
					<!--  -->

					<div class="col-10 pt-3 m-auto">
						<div class="input-container">
							<input type="text" id="filter" name="filter"  pattern="[A-Za-z].{1,}" title="Formato erroneo" required >
							
							<label for="filter" class="label">Categoria</label>
						</div>
					</div>


					<input type="hidden" name="operacio" value="addCategoria">

					<div class="col-12 my-3">
						<input type="submit" class="btn btn-success btn-lg" value="Añadir">
					</div> 
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal login fin -->

<!-- Modal Edit categoria -->
<div class="modal fade" id="CategoriaModal2" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" >
	<div class="modal-dialog " role="document"> 
		<div class="modal-content p-4 text-center">

			<form id="form-categoria2" action="../../controladores/categoriaController.php" method="POST" onsubmit="return validateFiltros()">

				<div class="row">
					<h3 class="col-12 text-left mb-3">Editar filtro: categoria</h3>

					<!-- Err -->
					<div id="FiltroErr" class="col-9 m-auto alert alert-danger" role="alert" style="display: none;">
						<span style="font-size: 0.9em">Este nombre ya esta en la lista.
						</span>
					</div>          
					<!--  -->

					<div class="col-10 pt-3 m-auto">
						<div class="input-container">
							<input type="text" id="filterupdate2" name="filterupdate2"  pattern="[A-Za-z].{1,}" title="Formato erroneo" required >
							<input type="hidden" id="id2" name="id2" >
							
							<label for="filterupdate2" class="label">Categoria</label>
						</div>
					</div>


					<input type="hidden" name="operacio" value="updateCategoria">

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

	$('#CategoriaModal').on('show.bs.modal', function (event) {

		array = <?php echo json_encode($array3)?>;
		console.log(array);

		filtro = document.forms["form-categoria"]["filter"].value;
		console.log(filtro);
	});


	$('#CategoriaModal2').on('show.bs.modal', function (event) {

		array = <?php echo json_encode($array3)?>;
		console.log(array);

		myVal = $(event.relatedTarget).data('val');
		$(this).find(".modal-body").text(myVal);
		document.getElementById("id2").value = myVal;
		console.log(myVal);

		myName = $(event.relatedTarget).data('val2');
		$(this).find(".modal-body").text(myName);
		document.getElementById("filterupdate2").value = myName;
		console.log(myName);
		
		filtro = document.forms["form-categoria2"]["filterupdate2"].value;

	});

</script>