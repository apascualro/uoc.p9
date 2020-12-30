<?php    
/*controladores*/
$controladores  = array('usuarios', 'comentarios', 'juegos');

foreach ($controladores as $key) {

	$ruta = "controladores/".$key."Controller.php"; $nivel = "../";

	for ($i=0; $i < 3; $i++) { 
		file_exists($ruta) ? require_once $ruta : false;
		$ruta = $nivel.$ruta; 
	}
}

if($_SESSION["esAdmin"]){							
	$item = $listaComTodos;
	// print_r($item);
}else{
	$item = $listaCom;
}



?>
<div class="col-md-12 content">

	<div class="row">

		<h3 class="col-12">Lista de comentarios</h3>


		<div class="col-12">
			<table class="w-100 table fz-14 ">

				<tr class="titulostabla">
					
					<?php if($_SESSION["esAdmin"]){ ?>
						<th>Id</th>
						<th>Usuario</th>
					<?php } ?>

					<th>Juego</th>
					<th>Fecha</th>
					<th>Título</th>
				</tr>

				<?php foreach($item as $objecte){ ?>

					<tr >

						<?php if($_SESSION["esAdmin"]){ ?>
							<td><?php echo $objecte->idComentario ?></td>
							<td><?php echo $objecte->usuario ?></td>
						<?php } ?>

						<?php 
						$u = new JuegosController();
						$nomJoc = $u->DetalleJuegoReturn($objecte->juego);
						?>

						<td><?php echo $nomJoc[0]->nombre ?></td>
						<td><?php echo $objecte->fecha ?></td>            
						<td><?php echo $objecte->titulo ?></td>

						<?php if($_SESSION["esAdmin"]){ ?>
							<td id="toggelsCom">
								<!-- Material checked -->
									<div class="switch" id="setQuickVarCom<?php echo $objecte->idComentario ?>">
										<label>
											<input class="boto" type="checkbox" id="<?php echo $objecte->idComentario ?>" <?php if($objecte->es_visible == 1){echo "checked";}?>>
											<span class="lever"></span>
										</label>
									</div>
									<div id="resultQuickVarCom<?php echo $objecte->idComentario ?>"></div>
							</td>            
						<?php }?>

						<td class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $objecte->idComentario; ?>">
							<a class="btn btn-sm btn-dark expand-button">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" width="18px" height="18px">
									<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
									<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
									<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
								</svg>
							</a>
						</td>

					</tr>

					<tr class="hide-table-padding">
						<td colspan="6" class="border-0">
							<div id="collapse<?php echo $objecte->idComentario; ?>" class="collapse in pl-3 mb-3">

								<div class="row">
									<div class="col-12">
										<h4>Descripcion</h4>
										<p><?php echo $objecte->descripcion ?></p>
									</div>           
									
								</div>

							</div>
						</td>
					</tr>


					<?php
				}?>

			</table>
		</div>
	</div>
</div>

<script>


</script>




