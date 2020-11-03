<?php
//GP
if (file_exists("../modelos/usuario-modelo.php")){
    require_once "../modelos/usuario-modelo.php";
}
// if (file_exists("../../modelos/usuario-modelo.php")){
//     require_once "../../modelos/usuario-modelo.php";
// }
// if (file_exists("../../../modelos/usuario-modelo.php")){
//     require_once "../../../modelos/usuario-modelo.php";
// }
// if (file_exists("../../../../modelos/usuario-modelo.php")){
//     require_once "../../../../modelos/usuario-modelo.php";
// }
//require "../Modelos/Administrador.php"; --NO

// require_once "SesionesController.php";
// $objecteSessions = new SesionesController();

class UsuariosController extends Usuario{

    /*********MOSTRAR USUARIOS********/
    public function LlistaUsuarios(){
        $Llistat = $this->retornaUsuariosTodos();
        require "../vistas/usuario/usuario-ver.php";
    }

    /*********REGISTRAR USUARIO*******/
    public function leeInfoUsuario($nombre, $apellidos, $email, $pass, $nombreUsuario){
        $this->resultadoRegistraUsuario($this->registraUsuario($email, $pass, $nombre, $apellidos, $nombreUsuario));
    }

    public function resultadoRegistraUsuario($resultat){
        if ($resultat){
            require "../vistas/usuario/usuario-insertado.php";
        }else{
            require "../vistas/usuario/usuario-Noinsertado.php";
        } 
    }



    // public function CheckejaUsuari($email, $paraula){
    //     $dadesUsuari = $this->BuscaUsuariPerEmail($email, $paraula);
    //     if ($dadesUsuari != null){
    //         foreach ($dadesUsuari as $infoDelUsuari){}  //només n'hi ha 1

    //         if ($paraula == $infoDelUsuari->password){
    //             $_SESSION["id_usuario"]=$infoDelUsuari->id_usuario;
    //             $_SESSION["email"]=$infoDelUsuari->email;
    //             $_SESSION["pass"]=$infoDelUsuari->password;
    //             $_SESSION["nombre"]=$infoDelUsuari->nombre;
    //             $_SESSION["apellidos"]=$infoDelUsuari->apellidos;
    //             $_SESSION["telefono"]=$infoDelUsuari->telefono;
    //             $_SESSION["rol"]=$infoDelUsuari->rol;
    //             $_SESSION["NoPermiso"]=null;
    //             //mira si es Client o Administrador:

    //             require_once "AdministradoresController.php";
    //             $administrador = new AdministradoresController();

    //             $_SESSION["errorProceso"]=false;

    //             if ($administrador->buscaAdmin($infoDelUsuari->id_usuario)){
    //                 $_SESSION["rol"]="Administrador";
    //                 $_SESSION["id_administrador"]=$administrador->retornaIdAdminDel($infoDelUsuari->id_usuario);

    //             }else{
    //                 require_once "ClientesController.php";
    //                 $cliente = new ClientesController();
    //                 if ($cliente->buscaCliente($infoDelUsuari->id_usuario)){
    //                     $_SESSION["rol"]="Cliente";
    //                     $_SESSION["id_cliente"]= $cliente->BuscaIdClienteDel($infoDelUsuari->id_usuario);  
    //                 }else{
    //                     if ($_SESSION["rol"]!="Administrador" && $_SESSION["rol"]!="Cliente"){
    //                         $_SESSION["mensajeLogin"]="<< Error al procesar la petición >>";
    //                         $_SESSION["errorProceso"]=true;
    //                     }

    //                 }
    //             }
    //             if(!$_SESSION["errorProceso"]){
    //                 $_SESSION["login"]=true;
    //                 header("location: ../index.php");
    //             }else{
    //                 $_SESSION["login"]=false;
    //                 $_SESSION["mensajeLogin"]="<< Error al procesar la petición >>";
    //                 header("location: ../index.php");
    //             }
    //         }else {
    //             $_SESSION["login"]=false;
    //             $_SESSION["mensajeLogin"]="Contraseña incorrecta";
    //             header("location: ../index.php");
    //         }
    //     }else{
    //         $_SESSION["login"]=false;
    //         $_SESSION["mensajeLogin"]="El usuario no existe";
    //         header("location: ../index.php");
    //     }
    // }

    // public function MuestraModificarUsuari($id){
    //     header("location: ../Vistas/Usuario/modificarUsuario.php?id=$id"); 
    // }

    // public function ModificarUsuari($id, $email, $pass, $nombre, $apellidos, $nombreUsuario, $esAdmin, $fecha, $nivel, $activo){
    //     $this->resultadoModificaUsuario($this->modificaUsuari($id, $email, $pass, $nombre, $apellidos, $nombreUsuario, $esAdmin, $fecha, $nivel, $activo));
    // }

    // public function resultadoModificaUsuario($resultat){
    //     if ($resultat){
    //         $_SESSION["mensajeResultado"]="
    //         <div style='background-color: green; height: 80px; text-align: center; padding-top: 5px;'>
    //         <h1>Usuario Modificado</h1>
    //         <div>";
    //     }else{
    //         $_SESSION["mensajeResultado"]="
    //         <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
    //         <h1>El Usuario NO se ha podido Modificar</h1>
    //         <div>";

    //     } 
    //     header("location: ../index.php");
    // }

    // public function modificarPass($id, $pass){
    //     $this->resultadoModificarPassword($this->modificarPassword($id,$pass));
    // }
    // public function resultadoModificarPassword($resultat){
    //     if ($resultat){
    //         $_SESSION["mensajeResultado"]="Contraseña modificada correctamente";
    //     }else{
    //         $_SESSION["mensajeResultado"]="La contraseña no se ha podido modificar";
    //     } 
    //     header('Location: ' . $_SERVER['HTTP_REFERER']);
    // }

    // public function modificarClnt($id, $email, $nombre, $apellidos, $nombreUsuario, $esAdmin, $fecha, $nivel, $activo){
    //     $this->resultadoModificarCliente($this->modificarCliente($id, $email, $nombre, $apellidos, $nombreUsuario, $esAdmin, $fecha, $nivel, $activo));
    // }
    // public function resultadoModificarCliente($resultat){
    //     if ($resultat){
    //         $_SESSION["mensajeResultado"]="Tus datos se han actualizado correctamente";
    //     }else{
    //         $_SESSION["mensajeResultado"]="Tus datos no se han podido actualizar";
    //     } 
    //     header("location: ../Vistas/Home/cliente-modificar.php");
    // }

    // public function modificarAdmn($id, $email, $nombre, $apellidos){
    //     $this->resultadoModificarAdministrador($this->modificarAdministrador($id, $email, $nombre, $apellidos));
    // }
    // public function resultadoModificarAdministrador($resultat){
    //     if ($resultat){
    //         $_SESSION["mensajeResultado"]="Tus datos se han actualizado correctamente";
    //     }else{
    //         $_SESSION["mensajeResultado"]="Tus datos no se han podido actualizar";
    //     } 
    //     header("location: ../Vistas/Home/admin-modificar.php");
    // }


}

/*OPERACIONES */

if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}

if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["nombreUsuario"])){
        if (!empty($_POST["email"]) && !empty($_POST["pass"])){
            $usuari = new UsuariosController();
            $usuari->leeInfoUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"] );
        }else{
            echo "Faltan datos";
        //header ("location: ../../index.php");
        }
    }else{
        echo "Operacion No permitida";
        echo $_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"], $_POST["creado"];
    }
}


// if(isset($_POST["operacio"]) && $_POST["operacio"]=="login"){
//     if (isset($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])){
//         $objecte = new UsuariosController();
//         $objecte->CheckejaUsuari($_POST["email"], $_POST["pass"]);
//     }else{
//         $_SESSION["mensajeResultado"]="
//         <div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'>
//         <h1>Tiene que introducir Emails y Password!</h1>
//         <div>";
//         header("location: ../index.php");
//     }
// }

// if(isset($_GET["operacio"]) && $_GET["operacio"]=="modificar"){
//     if (isset($_GET["usuario"]) && !empty($_GET["usuario"])){
//         $usuari = new UsuariosController();
//         $usuari->MuestraModificarUsuari($_GET["usuario"]);
//     }else{
//         echo "Operación No disponible";
//     }
// }

// if(isset($_POST["operacio"]) && $_POST["operacio"]=="modifica"){
//     if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["rol"])){
//         if (!empty($_POST["id"]) && !empty($_POST["email"]) && !empty($_POST["pass"])){
//             $usuari = new UsuariosController();
//             $usuari->ModificarUsuari($_POST["id"],$_POST["email"],$_POST["pass"],$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["rol"]);
//         }else{
//             echo "Faltan datos";
// //header ("location: ../../index.php");
//         }
//     }else{
//         echo "Operacion No permitida";
//     }
// }

// //AZ
// if(isset($_POST["operacio"]) && $_POST["operacio"]=="modificarPasswd"){
//     if (isset($_POST["id"]) && isset($_POST["pass"])){
//         if (!empty($_POST["id"]) && !empty($_POST["pass"])){
//             $usuari = new UsuariosController();
//             $usuari->modificarPass($_POST["id"],$_POST["pass"]);
//         }else{
//             echo "Faltan datos";
//         }
//     }else{
//         echo "Operacion No permitida";
//     }
// }

// //AZ
// if(isset($_POST["operacio"]) && $_POST["operacio"]=="modificarClient"){
//     if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) && isset($_POST["rol"])){
//         if (!empty($_POST["id"]) && !empty($_POST["email"])){
//             $usuari = new UsuariosController();
//             $usuari->modificarClnt($_POST["id"],$_POST["email"],$_POST["nombre"],$_POST["apellidos"],$_POST["telefono"],$_POST["rol"]);
//         }else{
//             echo "Faltan datos";
//         }
//     }else{
//         echo "Operacion No permitida";
//     }
// }

// //AZ
// if(isset($_POST["operacio"]) && $_POST["operacio"]=="modificarAdmin"){
//     if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"])){
//         if (!empty($_POST["id"]) && !empty($_POST["email"])){
//             $usuari = new UsuariosController();
//             $usuari->modificarAdmn($_POST["id"],$_POST["email"],$_POST["nombre"],$_POST["apellidos"]);
//         }else{
//             echo "Faltan datos";
//         }
//     }else{
//         echo "Operacion No permitida";
//     }
// }



?>