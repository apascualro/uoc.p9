<?php  ?>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">

      <form id="formComentario" action="../../controladores/comentariosController.php" method="POST">

        <div class="modal-header text-center">          
          <h3 class="modal-title">Añadir comentario</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body row m-auto">

          <!-- titulo -->
          <div class="col-md-9 mb-3">
            <div class="input-container">
              <input type="text"  name="titulo" required="required" value="">
              <label for="titulo" class="label">Titulo</label>
            </div>
          </div>

          <!--descripcion-->
          <div class="col-md-9 mb-3">
            <div class="input-container">
              <textarea id="descripcion" name="descripcion" required="required" rows="4"></textarea>
              <label for="descripcion" class="label">Comentario</label>
            </div>
          </div>


          <!---------------------------------- COMENTARIO AVANZADO ----------------------------------------->

            <!-- tematica-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Tematica</label>
              <div class="d-flex range-field my-3 w-50">
                <input name="op_comment_1" class="border-0" type="range" min="0" max="10" id="tematica"/>
                <span id="tematica" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div> -->

            <!-- Originalidad-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Originalidad</label>
              <div class="d-flex range-field my-3 w-50">
                <input  name="op_comment_2" class="border-0" type="range" min="0" max="10" id="originalidad" />
                <span id="originalidad" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div> -->

            <!-- Originalidad-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Edicion</label>
              <div class="d-flex range-field my-3 w-50">
                <input id="edicion" name="op_comment_3" class="border-0" type="range" min="0" max="10" />
                <span id="edicion" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div> -->

            <!-- Reincidencia-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Reincidencia</label>
              <div class="d-flex range-field my-3 w-50">
                <input id="reincidencia" name="op_comment_4" class="border-0" type="range" min="0" max="10" />
                <span id="reincidencia" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div> -->

            <!-- Escalabilidad-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Escalabilidad</label>
              <div class="d-flex range-field my-3 w-50">
                <input id="escalabilidad" name="op_comment_5" class="border-0" type="range" min="0" max="10" />
                <span id="escalabilidad" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div>      
 -->
            <!-- Azar-->
            <!-- <div class="col-md-4 mb-3">
              <label for="titulo" class="label">Azar</label>
              <div class="d-flex range-field my-3 w-50">
                <input id="azar" name="op_comment_6" class=" border-0" type="range" min="0" max="10" />
                <span id="azar" class="font-weight-bold text-primary ml-2 mt-1 valueSpan"></span>
              </div>
            </div> -->

            <!----------------------------  ---------------------------------------------->

          <div class="col-12 mt-3 mb-5 text-right">
            <button type="button" class="btn btn-lighten-4" data-dismiss="modal">Close</button>
            <input type="hidden" name="id" value="<?php echo $_SESSION["idJuego"]?>">
            <input type="hidden" name="operacio" value="addComentario">
            <input type="submit" value="Añadir comentario" class="btn btn-success ml-1">
          </div>

        </div>



      </div>

    </form>

  </div>

</div>

</div>

