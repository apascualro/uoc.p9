<?php 
if (file_exists('index.php')){$inicio = 'index.php';}
if (file_exists('../index.php')){$inicio = '../index.php';}
if (file_exists('../../index.php')){$inicio = '../../index.php';}

if (file_exists('../controladores/usuariosController.php')){$login = 'controladores/usuariosController.php?operacio=verAdmin';}
if (file_exists('../controladores/usuariosController.php')){$login = '../controladores/usuariosController.php?operacio=verAdmin';}
if (file_exists('../../controladores/usuariosController.php')){$login = '../../controladores/usuariosController.php?operacio=verAdmin';}

if (file_exists('../../controladores/sesionesController.php')){ $logout = '../../controladores/sesionesController.php?operacion=cerrarSesion';}
if (file_exists('../controladores/sesionesController.php')){  $logout = '../controladores/sesionesController.php?operacion=cerrarSesion';}
if (file_exists('/controladores/sesionesController.php')){$logout = '/controladores/sesionesController.php?operacion=cerrarSesion';}

?>



<nav class="navbar navbar-light">
  <a href="<?php echo $inicio ?>" class="navbar-brand text-dark">Crazy for Board Games</a>

  <form class="form-inline">
    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->

    <?php if(isset($_SESSION["idUsuario"])){ ?> 
      <a class="ml-3" href="<?php echo $login ?>"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="grey"  xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/></svg>
      </a>
      <a class="ml-3" href="<?php echo $logout ?>"><svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="grey" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
      </svg>
    </a>
  <?php }else{ ?> 
    <a data-toggle="modal" data-target="#loginModal" ><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-fill ml-3" fill="grey" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg>
  </a>
<?php } ?> 
</form>
</nav>


<!-- Modal login inicio -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog " role="document"> 
    <div class="modal-content p-4 text-center">

      <form id="form-login" action="../../controladores/usuariosController.php" method="POST" onsubmit="return validateLogin()">

        <div class="row">
          <h3 class="col-12 mb-3">Acceso de usuarios</h3>

          
          <!-- Err -->
          <div id="loginErr" class="col-9 m-auto alert alert-danger" role="alert" style="display: none;">
            <span style="font-size: 0.9em">El email no existe o la contraseña no es correcta.
            </span>
          </div>          
          <!--  -->

          <div class="col-12 pt-3">
            <div class="input-container">
              <input type="text" id="email" name="email" required="required">
              <label for="email" class="label">Tu e-mail</label>
            </div>
          </div>
          <div class="col-12 pt-3">
            <div class="input-container">
              <input type="text" id="password" name="password" required="required">
              <label for="password" class="label">Contraseña</label>
            </div>
          </div>
          
          <input type="hidden" name="operacio" value="LoginOk">

          <div class="col-12 mb-3">
            <input type="submit" class="btn btn-success btn-lg" value="Iniciar sesión">
          </div> 
          <!-- <div class="col-12">
            <a class="link" href="../../Vistas/Home/cliente-registro.php">No tengo cuenta, quiero registrarme</a>
          </div> -->
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal login fin -->
