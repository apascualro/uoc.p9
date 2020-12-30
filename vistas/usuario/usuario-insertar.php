<?php    
/***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un Usuario</h1>
<form action="../../controladores/usuariosController.php" method="POST">
    <div class="six fields">        
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre">

        </div>
        <div class="field">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>
        <div class="field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" placeholder="Email">
        </div>
        <div class="field">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña">
        </div>
        <div class="field">
            <label for="nombreUsuario">Nombre de usuario</label>
            <input type="text" name="nombreUsuario" placeholder="nombreUsuario">
        </div><!--  -->
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea Usuario">
    </div>


  <?php    
  /***  PIE */

  ?>