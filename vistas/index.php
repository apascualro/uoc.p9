<?php 
/*controladores*/
$controladores  = array('sesiones', 'usuarios', 'valoraciones', 'juegos');
foreach ($controladores as $key) {

  $ruta = "controladores/".$key."Controller.php"; $nivel = "../";

  for ($i=0; $i < 3; $i++) { 
    file_exists($ruta) ? require_once $ruta : false;
    $ruta = $nivel.$ruta; 
  }
}

/*sesion*/
$objecteSessio = new SesionesController(); 

unset($_SESSION['propiedadesJuego'], $_SESSION['idJuego']);

?>

<html>
<body>
  <?php include 'home/header/header.php';

  /**MOSTRAR LOS JUEGOS**/
  // if (file_exists('../../controladores/juegosController.php')){ require_once '../../controladores/juegosController.php';}
  // if (file_exists('../controladores/juegosController.php')){ require_once '../controladores/juegosController.php';}
  // if (file_exists('/controladores/juegosController.php')){ require_once '/controladores/juegosController.php';}
  ?>
  <section>
    <?php   
    if(isset($_SESSION["idUsuario"])){
      echo $_SESSION["idUsuario"];
    }
    $objecte = new JuegosController();
    $objecte->LlistaJuegos(); 
    ?> 
  </section>  

  <?php 
  if (file_exists("../vistas/home/footer/footer.php")){
    include "../vistas/home/footer/footer.php"; 
  }
  if (file_exists("../../vistas/home/footer/footer.php")){
    include "../../vistas/home/footer/footer.php"; 
  }
  ?>
</body>
</html>
