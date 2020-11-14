
<div class="col-md-12 content">

  <div class="row">

    <h4 class="col-12">Lista de juegos</h4>
    <div class="col-12 mg-0 auto text-right mb-3">
      <a href="../../controladores/juegosController.php?operacio=add" class="btn btn-info">Añadir juego</a>
    </div>

    <div class="col-12">
      <table class="w-100 table fz-14 ">

        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Subtitulo</th>
          <th>Estado</th>
          <th class="text-right">Opciones</th>
        </tr>

        <?php foreach($Llistat as $objecte){ ?>

          <tr>
            <td><?php echo $objecte->idJuego ?></td>
            <td><?php echo $objecte->nombre ?></td>
            <td><?php echo $objecte->subtitulo ?></td>
            <td><?php echo $objecte->es_activo ?></td>


            <td class="text-right">

              <a class="btn btn-sm btn-dark mb-2" href="../../controladores/juegosController.php?operacio=modificar&juego=<?php echo $objecte->idJuego; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18px" height="18px"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
              </a>

              <a class="btn btn-sm btn-dark" href="juegosController.php?operacio=verDetalle&juego=<?php echo $objecte->idJuego ?>">Ver detalle
              </a>
            </td>
          </tr>
          <?php
        }?>
      </table>
    </div>
  </div>
</div>
