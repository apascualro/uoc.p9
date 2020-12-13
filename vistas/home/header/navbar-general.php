<?php 
if (file_exists('index.php')){$inicio = 'index.php';}
if (file_exists('../index.php')){$inicio = '../index.php';}
if (file_exists('../../index.php')){$inicio = '../../index.php';}

if (file_exists('../controladores/usuariosController.php')){$login = '../controladores/usuariosController.php?operacio=verAdmin';}
if (file_exists('../../controladores/usuariosController.php')){$login = '../../controladores/usuariosController.php?operacio=verAdmin';}

?>



<nav class="navbar navbar-light bg-dark">
  <a href="<?php echo $inicio; ?>" class="navbar-brand text-white">Crazy for board games</a>

  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <a href="<?php echo $login; ?>"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-fill ml-3" fill="white" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
    </svg></a>
  </form>
</nav>


<!-- Modal login inicio -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-4 text-center">
      <form action="../../Controladores/UsuariosController.php?operacio=login" method="POST">
        <div class="row">
          <h3 class="col-12 mb-3">Acceso de usuarios</h3>
          <div class="col-12 mb-3">
            <div class="input-container">
              <input type="text" id="email" name="email" required="required">
              <label for="email" class="label">Tu e-mail</label>
            </div>
          </div>
          <div class="col-12 mb-3">
            <div class="input-container">
              <input type="text" id="password" name="password" required="required">
              <label for="password" class="label">Contraseña</label>
            </div>
          </div>
          <div class="col-12 mb-4">
            <input type="hidden" name="operacio" value="login">
            <input type="submit" class="btn btn-success btn-lg" value="Iniciar sesión">
          </div> 
          <div class="col-12">
            <a class="link" href="../../Vistas/Home/cliente-registro.php">No tengo cuenta, quiero registrarme</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal login fin -->
