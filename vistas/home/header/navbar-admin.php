  <ul class="nav mr-5 col-10 navadmin">
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "datos"){ echo "active";} ?>" href="admin-panel.php">DATOS PERSONALES</a>
    </li>

    <!-- elementos admin -->
    <?php if($_SESSION["esAdmin"]){ ?>

      <li class="nav-item">
        <a class="nav-link <?php if ($_SESSION["navActivo"] == "juegos"){ echo "active";} ?>" href="admin-panelJuego.php">JUEGOS</a>
      </li>


      <li class="nav-item">
        <a class="nav-link <?php if ($_SESSION["navActivo"] == "usuarios"){ echo "active";} ?>" href="admin-panelUsuario.php">USUARIOS</a>
      </li>
      <!--  -->

    <?php }
    else{
    ?>

      <!-- elementos user -->
      <li class="nav-item">
        <a class="nav-link <?php if ($_SESSION["navActivo"] == "favoritos"){ echo "active";} ?>" href="admin-panelFavoritos.php">FAVORITOS</a>
      </li>
    <?php } ?>
  </ul>