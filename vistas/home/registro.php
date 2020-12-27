<?php
/*controladores*/
$controladores  = array('sesiones', 'usuarios');

foreach ($controladores as $key) {

    $ruta = "controladores/".$key."Controller.php"; $nivel = "../";

    for ($i=0; $i < 3; $i++) { 
        file_exists($ruta) ? require_once $ruta : false;
        $ruta = $nivel.$ruta; 
    }
}


if (file_exists("../vistas/home/header/header.php")){
    include "../vistas/home/header/header.php";
}
if (file_exists("../home/header/header.php")){
    include "../home/header/header.php";
}
?>



<section class="admin">
    <div class="container mb-5" >
        <form id="form-addUser" action="../../controladores/usuariosController.php" method="POST" onsubmit="return validateForm()">         
            <div class="row">
                <h2 class="col-12 mt-5 mb-3 text-center ">Añadir usuario</h2>
                <div class="col-10 mx-auto">
                 <?php
                 $insert = "extern";
                 $objecte = new UsuariosController();
                 $objecte->MostrarAddUser();
                 ?> 

             </div>

         </div>                             
     </form>            
 </div>
</section>

<?php 
if (file_exists("../vistas/home/footer/footer.php")){
  include "../vistas/home/footer/footer.php"; 
}
if (file_exists("../../vistas/home/footer/footer.php")){
  include "../../vistas/home/footer/footer.php"; 
}
?>