<?php 

$objCom = new ComentariosController();
$qttCom = count($objCom->RetornarComentariosUsuario($_SESSION['idUsuario']));

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
      <p><?php echo $qttCom ?></p>
    </div>

  </div>



  <?php
}?>