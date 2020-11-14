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
?>

<html>
<body>
  <?php include 'header/header.php';

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



  <?php include 'footer/footer.php'; ?>
</body>
</html>
