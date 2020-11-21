<?php 
if (file_exists("controladores/sesionesController.php")){
  require_once "controladores/sesionesController.php";
}
if (file_exists("../controladores/sesionesController.php")){
  require_once "../controladores/sesionesController.php";
}
if (file_exists("../../controladores/sesionesController.php")){
  require_once "../../controladores/sesionesController.php";
}
$objecteSessio = new SesionesController(); 
unset($_SESSION['propiedadesJuego']);
?>

<html>
<body>
  <?php include 'home/header/header.php';

  /**MOSTRAR LOS JUEGOS**/
  if (file_exists('../../controladores/juegosController.php')){ require_once '../../controladores/juegosController.php';}
  if (file_exists('../controladores/juegosController.php')){ require_once '../controladores/juegosController.php';}
  if (file_exists('/controladores/juegosController.php')){ require_once '/controladores/juegosController.php';}
  ?>
  <section>
    <?php   
    $objecte = new JuegosController();
    $objecte->LlistaJuegos(); 
    ?> 
  </section>



  <?php include 'home/footer/footer.php'; ?>
</body>
</html>
