<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand text-center" href="#">Crazy for board games</a>

</nav>

    <!-- Modal login inicio -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content p-4 text-center">
          <form action="../../Controladores/UsuariosController.php?operacio=login" method="POST">
            <div class="row">
              <h4 class="col-12 mb-3">Acceso de usuarios</h4>
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
