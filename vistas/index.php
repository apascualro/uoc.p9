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
$_SESSION["idUsuario"] = 2;
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

  <!-- <?php 

  /*Determinar nivel usuario*/
  $nuevoObjeto3 = new UsuariosController();
  $nivel = $nuevoObjeto3->NivelUsuario($_SESSION["idUsuario"]);

  $experto = array();
  $principiante = array();
  $amateur = array();

  $valExp = 40;
  $valAmt = 35;
  $valPri = 25;

  $nuevoObjeto4 = new ValoracionesController();
  $b = $nuevoObjeto4->CantidadValoracionesNivel($_SESSION["idUsuario"]);
  foreach ($b as $key => $value) {
    $c = $value->nivel;
    switch ($c) {
      case 'Experto':
      $experto [] = $value->puntuacion;
      break;
      case 'Amateur':
      $amateur [] = $value->puntuacion;
      break;
      case 'Principiante':
      $principiante [] = $value->puntuacion;
      break;
      default:
      echo "error";
      break;
    }
  }

  $expertoSum = array();
  $amateurSum = array();
  $principianteSum = array();


  $countExp = count($experto);
  if($countExp >1){
    $valExp = $valExp/$countExp;
    foreach ($experto as $key) {
      $expertoSum [] = $key*$valExp;
    }
  }else{
    $expertoSum [] = $amateur[0]*$valExp;
  }

  $countAmt = count($amateur);
  if($countAmt >1){
    $valAmt = $valAmt/$countAmt;
    foreach ($amateur as $key) {
      $amateurSum [] = $key*$valAmt;
    }
  }else{
    $amateurSum [] = $amateur[0]*$valAmt;
  }


  $countPri = count($principiante);
  if($countPri >1){
    $valPri = $valPri/$countPri;
    foreach ($amateur as $key) {
      $principianteSum [] = $key*$valPri;
    }
  }else{
    $principianteSum [] = $principiante[0]*$valPri;
  }

  $resultado = (array_sum($expertoSum) + array_sum($amateurSum) + array_sum($principianteSum))/100;


  echo $resultado;

  ?> -->
</body>
</html>
