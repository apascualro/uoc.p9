
<!-- formulario -->
  <h4 class="col-12 mb-2">Modificar juego</h4>
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
    <div class="col-md-2 mb-3 mt-4 pl-5">
      <div class="form-check">
         <label for="es_activo" class="form-check-label">
          <input type="checkbox" name= "es_activo" class="form-check-input" value="1" <?php if($objecte->es_activo == 1) echo 'checked'?>>Activado
        </label>
      </div>
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
      <label >Complejidad</label>
      <select name="complejidad" class="custom-select">
        <option value="Facil"  <?php if($objecte->complejidad == "Facil" ){ echo "selected";}?>>Facil</option>
        <option value="Medio" <?php if($objecte->complejidad == "Medio" ){ echo "selected";}?>>Medio</option>
        <option value="Dificil" <?php if($objecte->complejidad == "Dificil" ){ echo "selected";}?>>Dificil</option>
      </select>
    </div>
    <!--tipo -->
    <div class="col-md-3 mb-3">
      <label >Tipo</label>
      <select name="tipo" class="custom-select">
        <option value="Coperativo" <?php if($objecte->tipo == "Coperativo" ){ echo "selected";}?>>Coperativo</option>
        <option value="Familiar" <?php if($objecte->tipo == "Familiar" ){ echo "selected";}?>>Familiar</option>
        <option value="Infantil" <?php if($objecte->tipo == "Infantil" ){ echo "selected";}?>>Infantil</option>
      </select>
    </div>
    <!--categoria -->
    <div class="col-md-3 mb-3">
      <label>Categoria</label>
      <select name="categoria" class="custom-select">
        <option value="Losetas" <?php if($objecte->categoria == "Losetas" ){ echo "selected";}?>>Losetas</option>
        <option value="Dados" <?php if($objecte->categoria == "Dados" ){ echo "selected";}?>>Dados</option>
        <option value="Rol" <?php if($objecte->categoria == "Rol" ){ echo "selected";}?>>Rol</option>
      </select>
    </div>
    <!--tematica -->
    <div class="col-md-3 mb-3">
      <label>Tematica</label>
      <select name="tematica" class="custom-select">
        <option value="Abstracto" <?php if($objecte->tematica == "Abstracto" ){ echo "selected";}?>>Abstracto</option>
        <option value="Historia" <?php if($objecte->tematica == "Historia" ){ echo "selected";}?>>Historia</option>
        <option value="Medieval" <?php if($objecte->tematica == "Medieval" ){ echo "selected";}?>>Medieval</option>
      </select>
    </div>

    <!---->


  </div>
</div>

<?php
}?>

