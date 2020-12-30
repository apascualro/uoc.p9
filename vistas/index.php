<?php 
/*controladores*/
$controladores  = array('sesiones', 'usuarios', 'valoraciones', 'juegos', 'imagenes');
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
$pageName = "galeria";

?>

<?php include 'home/header/header.php'; ?>

<section>

  <?php 
  if (isset($_SESSION["msgAddUser"])){
    echo "<div class='row text-center my-3'><div class='col-7 alert alert-success m-auto'><span class='msg '>".$_SESSION["msgAddUser"]."</span></div></div>";
    unset($_SESSION["msgAddUser"]);
  };
  ?>
  <?php include 'juego/juego-novedades.php'; ?> 

  <div class="row w-100 bg-light2">
     <?php include 'juego/juego-masvotados.php'; ?>
  </div>
  




  <?php   
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

