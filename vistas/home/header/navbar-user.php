  <ul class="nav mr-5 col-10 navadmin">
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "datos"){ echo "active";} ?>" href="admin-panel.php">DATOS PERSONALES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "favoritos"){ echo "active";} ?>" href="admin-panelJuego.php">FAVORITOS</a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "usuarios"){ echo "active";} ?>" href="admin-panelUsuario.php">USUARIOS</a>
    </li> -->

  </ul>