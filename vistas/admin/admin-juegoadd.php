<?php  
if (isset($_SESSION["msgAddJuego"])){
  echo "><div class='col-12 alert alert-success'><span class='msg'>".$_SESSION["msgAddJuego"]."</span></div>";
  unset($_SESSION["msgAddJuego"]);
};

if (isset($_SESSION["errAddJuego"])){
  echo "<div class='col-12 alert alert-danger'><span class='msg'>".$_SESSION["errAddJuego"]."</span></div>";
  unset($_SESSION["errAddJuego"]);
};

?>
<!-- formulario -->
<h3 class="col-12 mb-2">Añadir juego</h3>

<!-- nombre -->
<div class="col-md-6 mb-3">
  <div class="input-container">
    <input type="text" id="nombre" name="nombre" required="required" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>">
    <label for="nombre" class="label">Nombre*</label>
  </div>
</div>

<!--autor-->
<div class="col-md-4 mb-3">
  <div class="input-container">
    <input type="text" id="autor" name="autor"  value="<?php if(isset($_POST["autor"])){ echo $_POST["autor"];} ?>">
    <label for="autor" class="label">Autor</label>
  </div>
</div>

<!--num jugador-->
<div class="col-md-2 mb-3">
  <div class="input-container">
    <input type="text" id="jugadores" name="jugadores" value="<?php if(isset($_POST["jugadores"])){ echo $_POST["jugadores"];} ?>">
    <label for="jugadores" class="label">Jugadores</label>
  </div>
</div>

<!-- subtitulo-->
<div class="col-md-10 mb-3">
  <div class="input-container">
    <textarea id="subtitulo" name="subtitulo" required="required" rows="2"><?php if(isset($_POST["subtitulo"])){ echo $_POST["subtitulo"];} ?></textarea>
    <label for="subtitulo" class="label">Subtítulo*</label>
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
    <label for="descripcion" class="label">Descripción*</label>
  </div>
</div>    

<!--año-->
<div class="col-md-2 mb-3">
  <div class="input-container">
    <input type="text" id="year" name="year" value="<?php if(isset($_POST["year"])){ echo $_POST["year"];} ?>"></input>
    <label for="year" class="label">Año</label>
  </div>
</div>

<!--distribuidora-->
<div class="col-md-3 mb-3">
  <div class="input-container">
    <input type="text" id="distribuidora" name="distribuidora" value="<?php if(isset($_POST["distribuidora"])){ echo $_POST["distribuidora"];} ?>"></input>
    <label for="distribuidora" class="label">Distribuidora</label>
  </div>
</div>

<!--edad-->
<div class="col-md-2 mb-3">
  <div class="input-container">
    <input type="text" id="edad" name="edad"  value="<?php if(isset($_POST["edad"])){ echo $_POST["edad"];} ?>"></input>
    <label for="edad" class="label">Edad</label>
  </div>
</div>

<!--tiempo -->
<div class="col-md-2 mb-3">
  <div class="input-container">
    <input type="text" id="tiempo" name="tiempo" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>"></input>
    <label for="tiempo" class="label">Tiempo</label>
  </div>
</div>

<!--medidas -->
<div class="col-md-3 mb-3">
  <div class="input-container">
    <input type="text" id="medidas" name="medidas" value="<?php if(isset($_POST["medidas"])){ echo $_POST["medidas"];} ?>"></input>
    <label for="medidas" class="label">Medidas</label>
  </div>
</div>

<!--complejidad -->
<div class="col-md-3 mb-3">
  <div class="input-container slct">
    <select name="complejidad" required>
      <option value="">Seleccione:</option>
      <option value="Facil"  <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Facil" ){ echo "selected";}}?>>Facil</option>
      <option value="Medio" <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Medio" ){ echo "selected";}}?>>Medio</option>
      <option value="Dificil" <?php if(isset($_POST["complejidad"])){ if($_POST["complejidad"] == "Dificil" ){ echo "selected";}}?>>Dificil</option>
    </select>
    <label for="tipo" class="label">Complejidad</label>
  </div>
</div>

<!--tipo -->
<div class="col-md-3 mb-3">
  <div class="input-container slct">
    <select name="tipo" required>
      <option value="">Seleccione:</option>
      <?php
      foreach ($tiposNom as $tipo){
        echo "<option value=$tipo->nombre>".$tipo->nombre."</option>";
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
      <option value="">Seleccione:</option>
      <?php
      foreach ($categoriasNom as $categoria){
        echo "<option value=$categoria->nombre>".$categoria->nombre."</option>";
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
      <option value="">Seleccione:</option>
      <?php
      foreach ($tematicasNom as $tematica){
        echo "<option value=$tematica->nombre>".$tematica->nombre."</option>";
      }
      ?>
    </select>
    <label for="tematica" class="label">Tematica</label>
  </div>
</div>

<!--imagen portada -->
<div class="col-md-12 mb-3">
  <div class="input-container file">
    <label class="label" for="foto" >Imagen portada</label>
    <input type="file" class="prv1 img-test" id="file2" name="foto" required>
  </div>
  <div class="gallery1"></div>
</div>

<?php  ?>

