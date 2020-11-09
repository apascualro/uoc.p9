<?php 


if ($Llistat){
    foreach($Llistat as $objecte){

        ?>
        <h1>Modificar un Usuario</h1>

        <div class="six fields">
            <?php 
            if (isset($_SESSION["mensajeResultado"])){
                echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                unset($_SESSION["mensajeResultado"]);
            };
            ?>
            <form action="../../controladores/usuariosController.php" method="POST">
                <div class="field">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $objecte->nombre ?>"> 
                </div>
                <div class="field">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $objecte->apellidos ?>">
                </div>
                <div class="field">
                    <label for="email">Correo electrónico</label>
                    <input type="text" name="email" value="<?php echo $objecte->email ?>">
                </div>
                <div class="field">
                    <label for="pass">Contraseña</label>
                    <input type="text" name="pass" value="<?php echo $objecte->password ?>">
                </div>

                <div class="field">
                    <label for="nombreUsuario">Nombre de usuario</label>
                    <input type="text" name="nombreUsuario" value="<?php echo $objecte->nombreUsuario ?>">
                </div>
                <div class="field">
                    <label for="esAdmin">Administrador</label>
                    <input type="text" name="esAdmin" value="<?php echo $objecte->es_admin ?>">
                </div>
                <div class="field">
                    <label for="creado">Creado</label>
                    <input type="text" name="creado" value="<?php echo $objecte->creado ?>">
                </div>        
                <div class="field">
                    <label for="nivel">Nivel</label>
                    <input type="text" name="nivel" value="<?php echo $objecte->nivel ?>">
                </div>        
                <div class="field">
                    <label for="activo">Activo</label>
                    <input type="text" name="activo" value="<?php echo $objecte->es_activo ?>">
                </div>

                <input type="hidden" name="id" value="<?php echo $objecte->idUsuario ?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="modifica el Usuario">
            </form>
        </div>

        <?php
    }
}else{
    echo "NO se puede mostrar";
}

?>

<br>
<a href="../index.php">Inicio</a>