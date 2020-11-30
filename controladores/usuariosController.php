<?php
ob_start();

/*modelos y controladores*/
$modelos  = array( array('tipo'=>"modelos",'nombre'=>"usuario"), array('tipo'=>"controladores",'nombre'=>"sesiones"));

foreach ($modelos as $i => $key) {
    $key['tipo']== "modelos" ? $ruta = $key['nombre']."-modelo.php" : $ruta = $key['nombre']."Controller.php";
    $nivel = "../"; $path = $key['tipo']."/". $ruta;

    for ($i=0; $i < 3; $i++) { 
        file_exists($path) ? require_once $path : false;
        $path = $nivel.$path;
    }
}

/*sesion*/
$objecteSessio = new SesionesController(); 

class UsuariosController extends Usuario{

    /*===== MOSTRAR USUARIOS ======*/

    public function LlistaUsuarios(){
        $Llistat = $this->retornaUsuariosTodos();
        require "../vistas/usuario/usuario-ver.php";
    }

    /*===== REGISTRAR USUARIO ======*/
    
    /*envia la peticion*/
    public function LeeInfoUsuario($nombre, $apellidos, $email, $pass, $nombreUsuario){
        $this->ResultadoRegistraUsuario($this->registraUsuario($email, $pass, $nombre, $apellidos, $nombreUsuario));
    }

    /*muestra el resultado*/
    public function ResultadoRegistraUsuario($resultat){
        if ($resultat){
            require "../vistas/usuario/usuario-insertado.php";
        }else{
            require "../vistas/usuario/usuario-Noinsertado.php";
        } 
    }

    /*===== MOSTRAR PERFIL - ADMIN   ======*/
    
    public function PerfilAdmin(){
        $Llistat = $this->retornaUsuario('1');
        require "../../vistas/admin/admin-perfil.php";
    }

    /*===== MODIFICAR- ADMIN   ======*/
    
    /*muestra los datos a modificar*/
    public function MostrarModificarAdmin(){
        $Llistat = $this->retornaUsuario('1');
        // $Llistat = $this->retornaAdmin($_SESSION["id_usuario"]);
        if (file_exists("../vistas/admin/admin-perfilmodificar.php")){
            require_once "../vistas/admin/admin-perfilmodificar.php";
        }
        if (file_exists("../../vistas/admin/admin-perfilmodificar.php")){
            require_once "../../vistas/admin/admin-perfilmodificar.php";
        }
    }

    /*envia la peticion*/
    public function ModificarAdmin($id, $email, $nombre, $apellidos){
        $this->ResultadomodificarAdministrador($this->modificarAdministrador($id, $email, $nombre, $apellidos));
    }

    /*muestra el resultado*/
    public function ResultadomodificarAdministrador($resultat){
        if ($resultat){
            $_SESSION["mensajeResultado"]="Tus datos se han actualizado correctamente";
        }else{
            $_SESSION["mensajeResultado"]="Tus datos no se han podido actualizar";
        } 
        header("location: ../vistas/admin/admin-panel.php");
        exit;
    }


    /*===== OBTENER NIVEL ======*/
    
    public function NivelUsuario($id){
        return $this->retornaNivelUsuario($id);
    }

    


}

/*=============================================
=                  Operaciones                =
=============================================*/

/*===== VER USUARIO ======*/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="ver"){
    $objecte = new UsuariosController();
    $objecte->LlistaUsuarios();
}

/*===== REGISTRAR USUARIO ======*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="inserta"){
    if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["nombreUsuario"])){
        if (!empty($_POST["email"]) && !empty($_POST["pass"])){
            $usuari = new UsuariosController();
            $usuari->LeeInfoUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"] );
        }else{
            echo "Faltan datos";
        //header ("location: ../../index.php");
        }
    }else{
        echo "Operacion No permitida";
        echo $_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"], $_POST["creado"];
    }
}

/*===== VER USUARIO - perfil admin  ======*/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="verAdmin"){
        
        header('Location: ../vistas/admin/admin-panel.php');
        exit;
    
    // header('Location: ../vistas/admin/admin-panel.php');
    // $Administrador = new UsuariosController();
    // $Administrador->PerfilAdmin();
}

/*===== MODIFICAR USUARIO - perfil admin  ======*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="ModificarAdmin"){
    if (isset($_POST["id"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"])){
        if (!empty($_POST["id"]) && !empty($_POST["email"])){
            $usuari = new UsuariosController();
            $usuari->ModificarAdmin($_POST["id"],$_POST["email"],$_POST["nombre"],$_POST["apellidos"]);
        }else{
            echo "Faltan datos";
        }
    }else{
        echo "Operacion No permitida";
    }
}

?>