  <ul class="nav mr-5 col-10 navadmin">
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "datos"){ echo "active";} ?>" href="admin-panel.php">DATOS PERSONALES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "juegos"){ echo "active";} ?>" href="admin-panelJuego.php">JUEGOS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "usuarios"){ echo "active";} ?>" href="#">USUARIOS</a>
    </li>
  </ul>