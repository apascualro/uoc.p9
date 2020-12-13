<?php  ?>
<!-- formulario -->
<h3 class="col-12 mb-2">Añadir usuario</h3>

<?php if (isset($_SESSION["msgErrAddUser"])){
  echo "<div class='row'><div class='col-12 alert alert-danger'><span class='msg'>".$_SESSION["msgErrAddUser"]."</span></div></div>";
  unset($_SESSION["msgErrAddUser"]);
};
?>

<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="text" id="nombre" name="nombre" required="required" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];} ?>">
    <label for="nombre" class="label">Nombre</label>
  </div>
</div>
<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="text" id="apellidos" name="apellidos" required="required" value="<?php if(isset($_POST["apellidos"])){ echo $_POST["apellidos"];} ?>">
    <label for="apellidos" class="label">Apellidos</label>
  </div>
</div>
<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="password" id="pass" name="pass" required="required" value="<?php if(isset($_POST["pass"])){ echo $_POST["pass"];} ?>">
    <label for="pass" class="label">Contraseña</label>
  </div>
</div>

<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="password" id="c" name="pass2" required="required" value="<?php if(isset($_POST["pass2"])){ echo $_POST["pass2"];} ?>">
    <label for="pass2" class="label">Repetir contraseña</label>
  </div>
</div>

<!-- Err -->
<div id="passErr" class=" col-md-7 mb-3 ml-n1 alert alert-danger" role="alert" style="display: none">Las contraseñas no coinciden</div>
<!--  -->

<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="text" id="nombreUsuario" name="nombreUsuario" required="required" value="<?php if(isset($_POST["nombreUsuario"])){ echo $_POST["nombreUsuario"];} ?>">
    <label for="nombreUsuario" class="label">Nombre de Usuario</label>
  </div>
</div>

<!-- Err -->
<div id="userErr" class=" col-md-7 mb-3 ml-n1 alert alert-danger" role="alert" style="display: none">Este nombre de usuario ya esta en uso</div>
<!--  -->



<div class="col-md-8 mb-3">
  <div class="input-container ml-n3">
    <input type="email" id="emailRegister" name="email" required="required" value="<?php if(isset($_POST["email"])){ echo $_POST["email"];} ?>">
    <label for="email" class="label">Email</label>
  </div>
</div>

<!-- Err -->
<div id="emailErr" class=" col-md-7 mb-3 ml-n1 alert alert-danger" role="alert" style="display: none">Este email ya esta en uso</div>
<!--  -->


<div class="col-md-8 mb-3">
  <label >Perfil</label>
  <select name="rol" class="custom-select">
    <option value="admin" <?php if(isset($_POST["rol"])){ if($_POST["rol"] == "admin" ){ echo "selected";}}?>>admin</option>
    <option value="user" <?php if(isset($_POST["rol"])){ if($_POST["rol"] == "user" ){ echo "selected";}}?>>editor</option>
    
  </select>

</div>
<input type="hidden" name="operacio" value="AddUser">

<div class="col-12 mg-0 auto">
  <input type="submit" class="btn btn-success" value="Añadir usuario">
  <a href="admin-panelUsuarioAdd.php" class="btn btn-light">Cancelar</a>
</div>

<?php  ?>

