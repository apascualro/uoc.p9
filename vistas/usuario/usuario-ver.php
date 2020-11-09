<?php    
/***  ENCABEZADO */

    //require '';

?>

<h1>Lista TODOS los Usuarios</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_usuario</th>
            <th>nombre</th>
            <th>apellidos</th>
            <th>email</th>
            <th>password</th>
            <th>Nombre Usuario</th>
            <th>Es Admin</th>
            <th>Fecha creación</th>
            <th>Nivel</th>
            <th>Es Activo</th>
        </tr>
        <?php
        
        foreach($Llistat as $usuario){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $usuario->idUsuario ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->email ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->password ?></td>   
                <td style="border:1px solid black;"><?php echo $usuario->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->apellidos ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->nombreUsuario ?></td>                
                <td style="border:1px solid black;"><?php echo $usuario->es_admin ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->creado ?></td>                
                <td style="border:1px solid black;"><?php echo $usuario->nivel ?></td>
                <td style="border:1px solid black;"><?php echo $usuario->es_activo ?></td> 

                <td style="border:1px solid black;"><a href="usuariosController.php?operacio=modificar&usuario=<?php echo $usuario->idUsuario ?>">MODIFICAR</a></td>
                <?php                
            }
            ?>

        </table>
    </div>
    <br>
    <a href="../index.php">Inicio</a>

    <?php    
    /***  PIE */

    ?>