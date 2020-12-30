<?php 

$objCom = new ComentariosController();
$qttCom = count($objCom->RetornarComentariosUsuario($_SESSION['idUsuario']));



if($qttCom < 20){

  $msg = 20 - $qttCom;
  $text = "Valoraciones restantes para subir de nivel:";  

}elseif($qttCom < 40){

  $msg = 40 - $qttCom;
  $text = "Valoraciones restantes para subir de nivel:";

}else{

  $msg = 200 -$qttCom; 
  $text = "Ya eres todo un experto! Valoraciones restantes para ser moderador:";

}

?>

<div class="col-md-5">
  <?php foreach($Llistat as $objecte){ ?>


    <div class="input-container mb-3 disabled">

      <span class="label sm">Nombre</span>
      <div class="input">
        <?php echo $objecte->nombre ?>
      </div>

    </div>


    <div class="input-container mb-3 disabled">

      <span class="label sm">Apellidos</span>
      <div class="input">
        <?php echo $objecte->apellidos ?>
      </div>

    </div>

    <div class="input-container mb-3 disabled">

      <span class="label sm">Nombre de usuario</span>
      <div class="input">
        <?php echo $objecte->nombreUsuario ?>
      </div>

    </div>


    <div class="input-container mb-3 disabled">

      <span class="label sm">E-mail</span>
      <div class="input">
        <?php echo $objecte->email ?>
      </div>

    </div>

  </div>


  <div class="col-md-1"></div>

  <div class="col-md-6">

    <div class="container mb-3">
      <strong class="font-weight-bold ">Usuario desde</strong>
      <p><?php echo $objecte->creado ?></p>
    </div>

    <div class="container mb-3">
      <strong class="font-weight-bold ">Total comentarios</strong>
      <p><?php echo $qttCom." mensajes"?></p>
    </div>

    <div class="container mb-3">
      <strong class="font-weight-bold ">Nivel</strong>
      <p><?php echo $objecte->nivel ?></p>
    </div>

    <div class="container mb-3 info-nivel">
      <strong class="font-weight-bold "><?php echo $text; ?></strong>
      <p><?php echo $msg ?></p>
    </div>

  </div>



  <?php
}?>