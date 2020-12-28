
<?php 
$is = new ImagenesController();
$imgs = $is->ImagenesNoticia($_SESSION["idJuego"]);
?>

<div class="col-md-12 mb-3">
	<div class="input-container d-flex ">
		<label class="label" for="file3" >Imagenes (<?php echo count($imgs); ?>)</label>
		<?php foreach ($imgs as $key => $value) { ?>
			<div class="filedit overflow-hidden mb-2">
				<img class="mt-5  ml-2"  src="../assets/img/<?php echo $value->nombre ?>"/>
			</div>
			
		<?php }
		?>		

	</div>
	<!-- <input type="file" class="img-test mt-3" id="file3" name="files[]" multiple required />	 -->
	<div class="gallery"></div>
</div>
		
<script>
	
</script>