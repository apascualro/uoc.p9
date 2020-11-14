<?php  ?>
<!-- formulario -->
  <h4 class="col-12 mb-2">Añadir juego</h4>

    <!-- nombre -->
    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" id="nombre" name="nombre" required="required" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>">
        <label for="nombre" class="label">Nombre</label>
      </div>
    </div>
    <!--autor-->
    <div class="col-md-4 mb-3">
      <div class="input-container">
        <input type="text" id="autor" name="autor" required="required" value="<?php if(isset($_POST["autor"])){ echo $_POST["autor"];} ?>">
        <label for="autor" class="label">Autor</label>
      </div>
    </div>
    <!-- subtitulo-->
    <div class="col-md-10 mb-3">
      <div class="input-container">
        <textarea id="subtitulo" name="subtitulo" required="required" rows="2"><?php if(isset($_POST["subtitulo"])){ echo $_POST["subtitulo"];} ?></textarea>
        <label for="subtitulo" class="label">Subtítulo</label>
      </div>
    </div>
    <!--es_activo -->
    <div class="col-md-2 mb-3 mt-4 pl-5">
      <div class="form-check">
         <label for="es_activo" class="form-check-label">
          <input type="checkbox" name= "es_activo" class="form-check-input" value="1" <?php 
          if(isset($_POST["es_activo"])){ if($_POST["es_activo"] == 1) { echo 'checked'; }}?>>Activado
        </label>
      </div>
    </div>
    <!-- descripcion-->
    <div class="col-md-12 mb-3">
      <div class="input-container">
        <textarea type="text" id="descripcion" name="descripcion" required="required" rows="5"><?php if(isset($_POST["descripcion"])){ echo $_POST["descripcion"];} ?></textarea>
        <label for="descripcion" class="label">Descripción</label>
      </div>
    </div>    
    <!--año-->
    <div class="col-md-2 mb-3">
      <div class="input-container">
        <input type="text" id="year" name="year" required="required" value="<?php if(isset($_POST["year"])){ echo $_POST["year"];} ?>"></input>
        <label for="year" class="label">Año</label>
      </div>
    </div>
    <!--distribuidora-->
    <div class="col-md-3 mb-3">
      <div class="input-container">
        <input type="text" id="distribuidora" name="distribuidora" required="required" value="<?php if(isset($_POST["distribuidora"])){ echo $_POST["distribuidora"];} ?>"></input>
        <label for="distribuidora" class="label">Distribuidora</label>
      </div>
    </div>
    <!--edad-->
    <div class="col-md-2 mb-3">
      <div class="input-container">
        <input type="text" id="edad" name="edad" required="required" value="<?php if(isset($_POST["edad"])){ echo $_POST["edad"];} ?>"></input>
        <label for="edad" class="label">Edad</label>
      </div>
    </div>
    <!--tiempo -->
    <div class="col-md-2 mb-3">
      <div class="input-container">
        <input type="text" id="tiempo" name="tiempo" required="required" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>"></input>
        <label for="tiempo" class="label">Tiempo</label>
      </div>
    </div>
    <!--medidas -->
    <div class="col-md-3 mb-3">
      <div class="input-container">
        <input type="text" id="medidas" name="medidas" required="required" value="<?php if(isset($_POST["medidas"])){ echo $_POST["medidas"];} ?>"></input>
        <label for="medidas" class="label">Medidas</label>
      </div>
    </div>
    <!--complejidad -->
    <div class="col-md-3 mb-3">
      <label >Complejidad</label>
      <select name="complejidad" class="custom-select">
        <option value="Facil"  <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Facil" ){ echo "selected";}}?>>Facil</option>
        <option value="Medio" <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Medio" ){ echo "selected";}}?>>Medio</option>
        <option value="Dificil" <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Dificil" ){ echo "selected";}}?>>Dificil</option>
      </select>
    </div>
    <!--tipo -->
    <div class="col-md-3 mb-3">
      <label >Tipo</label>
      <select name="tipo" class="custom-select">
        <option value="Coperativo" <?php if(isset($_POST["tipo"])){ if($_POST["tipo"] == "Coperativo" ){ echo "selected";}}?>>Coperativo</option>
        <option value="Familiar" <?php if(isset($_POST["tipo"])){ if($_POST["tipo"] == "Familiar" ){ echo "selected";}}?>>Familiar</option>
        <option value="Infantil" <?php if(isset($_POST["tipo"])){ if($_POST["tipo"] == "Infantil" ){ echo "selected";}}?>>Infantil</option>
      </select>
    </div>
    <!--categoria -->
    <div class="col-md-3 mb-3">
      <label>Categoria</label>
      <select name="categoria" class="custom-select">
        <option value="Losetas" <?php if(isset($_POST["categoria"])){ if($_POST["categoria"] == "Losetas" ){ echo "selected";}}?>>Losetas</option>
        <option value="Dados" <?php if(isset($_POST["categoria"])){ if($_POST["categoria"] == "Dados" ){ echo "selected";}}?>>Dados</option>
        <option value="Rol" <?php if(isset($_POST["categoria"])){ if($_POST["categoria"] == "Rol" ){ echo "selected";}}?>>Rol</option>
      </select>
    </div>
    <!--tematica -->
    <div class="col-md-3 mb-3">
      <label>Tematica</label>
      <select name="tematica" class="custom-select">
        <option value="Abstracto" <?php if(isset($_POST["tematica"])){ if($_POST["tematica"] == "Abstracto" ){ echo "selected";}}?>>Abstracto</option>
        <option value="Historia" <?php if(isset($_POST["tematica"])){ if($_POST["tematica"] == "Historia" ){ echo "selected";}}?>>Historia</option>
        <option value="Medieval" <?php if(isset($_POST["tematica"])){ if($_POST["tematica"] == "Medieval" ){ echo "selected";}}?>>Medieval</option>
      </select>
    </div>

<?php  ?>

