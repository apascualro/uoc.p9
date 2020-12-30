<ul class="nav mr-5 col-10 navadmin">
  <li class="nav-item">
    <a class="nav-link <?php if ($_SESSION["navActivo"] == "datos"){ echo "active";} ?>" href="admin-panel.php"><h4>DATOS PERSONALES</h4></a>
  </li>

  <!-- elementos admin -->
  <?php if($_SESSION["esAdmin"]){ ?>

    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "juegos"){ echo "active";} ?>" href="admin-panelJuego.php"><h4>JUEGOS</h4></a>
    </li>
    

    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "filtros"){ echo "active";} ?>" href="admin-panelFiltros.php"><h4>FILTROS</h4></a>
    </li>


    <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "usuarios"){ echo "active";} ?>" href="admin-panelUsuario.php"><h4>USUARIOS</h4></a>
    </li>



    <!--  -->

    <?php 
  }
  else{
    ?>

    <!-- elementos user -->
    <!-- <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "favoritos"){ echo "active";} ?>" href="admin-panelFavoritos.php"><h4>FAVORITOS</h4></a>
    </li> -->
    
  <?php } ?>
  <li class="nav-item">
      <a class="nav-link <?php if ($_SESSION["navActivo"] == "comentarios"){ echo "active";} ?>" href="admin-panelComentarios.php"><h4>COMENTARIOS</h4></a>
    </li>
</ul>