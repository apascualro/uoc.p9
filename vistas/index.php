<?php 
/*controladores*/
$controladores  = array('sesiones', 'usuarios', 'valoraciones');
foreach ($controladores as $key) {

  $ruta = "controladores/".$key."Controller.php"; $nivel = "../";

  for ($i=0; $i < 3; $i++) { 
    file_exists($ruta) ? require_once $ruta : false;
    $ruta = $nivel.$ruta; 
  }
}

/*sesion*/
$objecteSessio = new SesionesController(); 

unset($_SESSION['propiedadesJuego']);
$_SESSION["idUsuario"] = 3;
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


  <form method="post">
      <input type="hidden" name="options" value="4">
  </form>
  <a href="../controladores/valoracionesController.php?operacio=updateValoracion&options=3">a</a>
</body>
</html>
