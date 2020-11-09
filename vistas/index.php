<?php 
if (file_exists("controladores/sesionesController.php")){
  require_once "controladores/sesionesController.php";}
if (file_exists("../controladores/sesionesController.php")){
  require_once "../controladores/sesionesController.php";}
if (file_exists("../../controladores/sesionesController.php")){
  require_once "../../controladores/sesionesController.php";}
$objecteSessio = new SesionesController(); 
?>

<html>
<body>
  <?php include 'header/header.php';

  /**MOSTRAR LOS JUEGOS**/
  if (file_exists('../../controladores/juegosController.php')){ require_once '../../controladores/juegosController.php';}
  if (file_exists('../controladores/juegosController.php')){ require_once '../controladores/juegosController.php';}
  if (file_exists('/controladores/juegosController.php')){ require_once '/controladores/juegosController.php';}

  $objecte = new JuegosController();
  $objecte->LlistaJuegos();

  ?>
  
  <!-- <h2>Enlaces usuarios</h2>
  <a href="../controladores/usuariosController.php?operacio=ver">ver usuarios</a><br>
  <a href="../vistas/usuario/usuario-insertar.php">añadir usuario</a>
  <br>
  <a href="../vistas/usuario/usuario-insertar.php">editar usuario</a>

  
  <h2>Enlaces juegos</h2>
  <a href="../controladores/juegosController.php?operacio=ver">ver juegos</a><br>

  <h2>Enlaces comentarios</h2>

  <h2>Enlaces valoraciones</h2> -->


  <?php include 'footer/footer.php'; ?>
</body>
</html>
