<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1 style="color: red;">>> ERROR - Usuario no creado << </h1>

<a href="../vistas/usuario/usuario-insertar.php">Insertar otro</a>
<br>
<a href="../index.php">Inicio</a>

<?php    
echo $_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"];
    /***  PIE */

?>