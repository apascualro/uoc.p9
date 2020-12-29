
<div class="col-md-12 content">

  <div class="row">

    <h3 class="col-12">Lista de usuarios</h3>

    <div class='col-12 alert alert-success d-none'>
      <span class='msg '>El usuario ha sido modificado</span>
    </div>
    <div class='col-12 alert alert-danger d-none'>
      <span class='msg '>El usuario no ha sido modificado</span>
    </div>

    <div class="col-12 mg-0 auto text-right mb-3">
      <a href="../../controladores/usuariosController.php?operacio=add" class="btn btn-info">Añadir usuario</a>
    </div>

    <div class="col-12">
      <table class="w-100 table fz-14 ">

        <tr class="titulostabla">
          <th>Id</th>
          <th>Usuario</th>
          <th>Email</th>
          <th>Nivel</th>
          <th>Estado</th>
        </tr>

        <?php foreach($LlistatUser as $objecte){ ?>

          <tr >
            <td><?php echo $objecte->idUsuario ?></td>
            <td><?php echo $objecte->nombreUsuario ?></td>
            <td><?php echo $objecte->email ?></td>            
            <td><?php echo $objecte->nivel ?></td>
            <td id="toggels">
              <!-- Material checked -->
              <?php if($objecte->es_admin == 0){?>
                <div class="switch" id="setQuickVar<?php echo $objecte->idUsuario ?>">
                  <label>
                    <input class="boto" type="checkbox" id="<?php echo $objecte->idUsuario ?>" <?php if($objecte->es_activo == 1){echo "checked";}?>>
                    <span class="lever"></span>
                  </label>
                </div>
                <div id="resultQuickVar<?php echo $objecte->idUsuario ?>"></div>
              <?php } ?>
            </td>            

            <td class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $objecte->idUsuario; ?>">
              <a class="btn btn-sm btn-dark expand-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" width="18px" height="18px">
                  <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                  <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
              </a>
            </td>

          </tr>

          <tr class="hide-table-padding">
            <td colspan="6" class="border-0">
              <div id="collapse<?php echo $objecte->idUsuario; ?>" class="collapse in pl-3 mb-3">

                <div class="row">
                  <div class="col-2">
                    <h4>Nombre</h4>
                    <p><?php echo $objecte->nombre ?></p>
                  </div>           
                  <div class="col-4">
                    <h4>Apellidos</h4>
                    <p><?php echo $objecte->apellidos ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Contraseña</h4>
                    <p><?php echo $objecte->password ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Creado</h4>
                    <p><?php echo $objecte->creado ?></p>
                  </div>
                  <div class="col-2">
                    <h4>Tipo</h4>
                    <p><?php if($objecte->es_admin == 0){echo "usuario";}else{echo "administrador";} ?></p>
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

<script>

  
</script>



