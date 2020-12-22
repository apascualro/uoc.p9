
<div class="col-md-12 content">

  <div class="row">

    <h3 class="col-12">Lista de juegos</h3>
    <div class="col-12 mg-0 auto text-right mb-3">
      <a href="../../controladores/juegosController.php?operacio=add" class="btn btn-info">Añadir juego</a>
    </div>

    <div class="col-12">
      <table class="w-100 table fz-14 ">

        <tr class="titulostabla">
          <th>Id</th>
          <th>Nombre</th>
          <th>Subtitulo</th>
          <th>Estado</th>
          <!-- <th class="text-right">Opciones</th> -->
        </tr>

        <?php foreach($Llistat as $objecte){ ?>

          <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $objecte->idJuego; ?>">
            <td><?php echo $objecte->idJuego ?></td>
            <td><?php echo $objecte->nombre ?></td>
            <td><?php echo $objecte->subtitulo ?></td>
            <td><?php if($objecte->es_activo == 1){echo "visible";}else{echo "deshabilitado";} ?></td>
            <td class="text-right">
              <a class="btn btn-sm btn-dark mb-2" href="../../controladores/juegosController.php?operacio=modificar&juego=<?php echo $objecte->idJuego; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18px" height="18px">
                  <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                  <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
              </a>

              <td>
                <a class="btn btn-sm btn-dark expand-button">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" width="18px" height="18px">
                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                </a>
              </td>
            </td>
          </tr>
          <tr class="hide-table-padding">
            <td colspan="6" class="border-0">
              <div id="collapse<?php echo $objecte->idJuego; ?>" class="collapse in pl-3 mb-3">
                <div class="row">
                  <div class="col-12">
                    <h4>Descripción</h4>
                    <p><?php echo $objecte->descripcion ?></p>
                  </div>            
                </div>
                <div class="row">
                  <div class="col-2">
                    <h4>Autor</h4>
                    <p><?php echo $objecte->autor ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Año</h4>
                    <p><?php echo $objecte->year ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Distribuidora</h4>
                    <p><?php echo $objecte->distribuidora ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Edad</h4>
                    <p><?php echo $objecte->edad ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Puntuación</h4>
                    <p><?php echo $objecte->valoracion ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Tiempo juego</h4>
                    <p><?php echo $objecte->tiempo ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-2">
                    <h4>Tipo</h4>
                    <p><?php echo $objecte->tipo ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Categoria</h4>
                    <p><?php echo $objecte->categoria ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Tematica</h4>
                    <p><?php echo $objecte->tematica ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Dificultad</h4>
                    <p><?php echo $objecte->complejidad ?></p>
                  </div>
                  <div class="col-4">
                    <h4>Medidas</h4>
                    <p><?php echo $objecte->medidas ?></p>
                  </div>                          
                </div>
                <div class="row">
                  <div class="col-2">
                    <h4>Originalidad</h4>
                    <p><?php echo $objecte->op_originalidad ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Temática</h4>
                    <p><?php echo $objecte->op_tematica ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Edición</h4>
                    <p><?php echo $objecte->op_edicion ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Reincidencia</h4>
                    <p><?php echo $objecte->op_reincidencia ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Escalabilidad</h4>
                    <p><?php echo $objecte->op_escalabilidad ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Azar</h4>
                    <p><?php echo $objecte->op_azar ?></p>
                  </div>
                </div>

              </div>
            </td>
          </tr>


          <?php
        }?>

      </table>
    </div>
  </div>
</div>





