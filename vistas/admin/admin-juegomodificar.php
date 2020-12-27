
<!-- formulario -->
<h3 class="col-12 mb-2">Modificar juego</h3>
<?php foreach($Llistat as $objecte){ ?>

  <!-- nombre -->
  <div class="col-md-6 mb-3">
    <div class="input-container">
      <input type="text" id="nombre" name="nombre" required="required" value="<?php echo $objecte->nombre ?>">
      <label for="nombre" class="label">Nombre</label>
    </div>
  </div>

  <!--autor-->
  <div class="col-md-4 mb-3">
    <div class="input-container">
      <input type="text" id="autor" name="autor" required="required" value="<?php echo $objecte->autor ?>">
      <label for="autor" class="label">Autor</label>
    </div>
  </div>

  <!-- id -->
  <div class="col-md-2 mb-3">
    <div class="input-container disabled">
      <div class="input">
        <?php echo $objecte->idJuego ?>
      </div>
      <span class="label sm">Identificador</span>
    </div>
  </div> 

  <!-- subtitulo-->
  <div class="col-md-10 mb-3">
    <div class="input-container">
      <textarea id="subtitulo" name="subtitulo" required="required" rows="2"><?php echo $objecte->subtitulo ?></textarea>
      <label for="subtitulo" class="label">Subtítulo</label>
    </div>
  </div>

  <!--es_activo -->
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultChecked2" <?php if($objecte->es_activo == 1) echo 'checked' ?> name= "es_activo" value="1">
    <label class="custom-control-label" for="defaultChecked2">Activado</label>
  </div>

  <!-- descripcion-->
  <div class="col-md-12 mb-3">
    <div class="input-container">
      <textarea type="text" id="descripcion" name="descripcion" required="required" rows="5"><?php echo $objecte->descripcion ?></textarea>
      <label for="descripcion" class="label">Descripción</label>
    </div>
  </div>    

  <!--año-->
  <div class="col-md-2 mb-3">
    <div class="input-container">
      <input type="text" id="year" name="year" required="required" value="<?php echo $objecte->year ?>"></input>
      <label for="year" class="label">Año</label>
    </div>
  </div>

  <!--distribuidora-->
  <div class="col-md-3 mb-3">
    <div class="input-container">
      <input type="text" id="distribuidora" name="distribuidora" required="required" value="<?php echo $objecte->distribuidora ?>"></input>
      <label for="distribuidora" class="label">Distribuidora</label>
    </div>
  </div>

  <!--edad-->
  <div class="col-md-2 mb-3">
    <div class="input-container">
      <input type="text" id="edad" name="edad" required="required" value="<?php echo $objecte->edad ?>"></input>
      <label for="edad" class="label">Edad</label>
    </div>
  </div>

  <!--tiempo -->
  <div class="col-md-2 mb-3">
    <div class="input-container">
      <input type="text" id="tiempo" name="tiempo" required="required" value="<?php echo $objecte->tiempo ?>"></input>
      <label for="tiempo" class="label">Tiempo</label>
    </div>
  </div>

  <!--medidas -->
  <div class="col-md-3 mb-3">
    <div class="input-container">
      <input type="text" id="medidas" name="medidas" required="required" value="<?php echo $objecte->medidas ?>"></input>
      <label for="medidas" class="label">Medidas</label>
    </div>
  </div>

  <!--complejidad -->
  <div class="col-md-3 mb-3">
    <div class="input-container slct"> 
      <select name="complejidad" class="custom-select" required>
        <option value="Facil"  <?php if($objecte->complejidad == "Facil" ){ echo "selected";}?>>Facil</option>
        <option value="Medio" <?php if($objecte->complejidad == "Medio" ){ echo "selected";}?>>Medio</option>
        <option value="Dificil" <?php if($objecte->complejidad == "Dificil" ){ echo "selected";}?>>Dificil</option>
      </select>
      <label for="tipo" class="label">Complejidad</label>
    </div>
  </div>

  <!--tipo -->
  <div class="col-md-3 mb-3">
    <div class="input-container slct">
      <select name="tipo" class="custom-select" required>
        <?php
        foreach ($tiposNom as $tipo){
          echo "<option value=$tipo->nombre>".$tipo->nombre."</option>";
          if($objecte->tipo == $tipo->nombre){
            echo "selected";
          } 
        }
        ?>
      </select>
      <label for="tipo" class="label">Tipo</label>
    </div>
  </div>

  <!--categoria -->
  <div class="col-md-3 mb-3">
    <div class="input-container slct">
      <select name="categoria" required>
        <?php
        foreach ($categoriasNom as $categoria){
          echo "<option value=$categoria->nombre>".$categoria->nombre."</option>";
          if($objecte->categoria == $categoria->nombre){
            echo "selected";
          } 
        }
        ?>
      </select>
      <label for="categoria" class="label">Categoria</label>
    </div>
  </div>


  <!--tematica -->
  <div class="col-md-3 mb-3">
    <div class="input-container slct">
      <select name="tematica" required>
        <?php
        foreach ($tematicasNom as $tematica){
          echo "<option value=$tematica->nombre>".$tematica->nombre."</option>";
          if($objecte->tematica == $tematica->nombre){
            echo "selected";
          } 
        }
        ?>
      </select>
      <label for="tematica" class="label">Tematica</label>
    </div>
  </div>

  <?php 
  $i = new ImagenesController();
  $imgPortada = $i->ImagenPortada($objecte->idJuego);
   ?>

  <!--imagen portada -->
  <div class="col-md-12 mb-3">
    <div class="input-container file">
      <label class="label" for="foto" >Imagen portada</label>
      <img class="mt-5 mb-2 ml-2" style="width: 200px;" src="../assets/img/<?php echo $imgPortada ?>"/>
      <input type="file" class="prv1 img-test" id="file2" name="foto" required>

    </div>
    <div class="gallery1"></div>
  </div>

  <!---->


  <?php
}?>

