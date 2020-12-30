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
        $LlistatUser = $this->retornaUsuariosTodos();
        require "admin-usuarios.php";
    }

    /*=====  LOGIN - COMPROBAR USUARIO-PASS  ======*/

    /*ajax*/
    public function compruebaLogin($email,$pass){
        return $this->ResultadoLogin($this->retornaLogin($email, $pass));        
    }
    /*return idusuario*/
    public function ResultadoLogin($resultat){

        if($resultat){
            foreach ($resultat as $key => $x) {
                $_SESSION["esAdmin"] = $x->es_admin;
                $_SESSION["idUsuario"] = $x->idUsuario;
            }
        }
        return $resultat;    
    }


    /*===== REGISTRAR USUARIO ======*/

    /*mostrar el formulario*/
    public function MostrarAddUser(){
        if(isset($vista) && $vista =="admin"){
            if (file_exists("admin-usuariosadd.php")){
                require "admin-usuariosadd.php";
            }
        }

        if (file_exists("../admin/admin-usuariosadd.php")){
            require "../admin/admin-usuariosadd.php";
        }
    }

    //ajax comprueba email
    public function compruebaEmail($email){
        return $this->retornaEmail($email);
    }

    //ajax comprueba nombre usuario
    public function compruebaUserName($nombreUsuario){
        return $this->retornaUserName($nombreUsuario);
    }

    /*envia la peticion*/
    public function LeeInfoUsuario($nombre, $apellidos, $email, $pass, $nombreUsuario, $rol, $registro){
        $this->ResultadoRegistraUsuario($this->registraUsuario($email, $pass, $nombre, $apellidos, $nombreUsuario, $rol), $registro);
    }

    /*muestra el resultado*/
    public function ResultadoRegistraUsuario($resultat, $registro){

        if($registro){
            if ($resultat){
                $_SESSION["msgAddUser"]= "El usuario se ha añadido correctamente";
            }else{
                $_SESSION["msgErrAddUser"]= "El usuario o el email que has introducido ya estan en uso";          
            } 
            header("location:../vistas/admin/admin-panelUsuario.php");
        // $_SESSION["msgErrAddUser"]="";
        }else{
            $_SESSION["msgAddUser"]= "El usuario se ha añadido correctamente, ya puedes iniciar sesión.";
            header("location:../vistas/index.php");
        }

        
    }

    /*===== MOSTRAR PERFIL - ADMIN   ======*/

    public function PerfilAdmin(){
        $Llistat = $this->retornaUsuario($_SESSION['idUsuario']);
        require "../../vistas/admin/admin-perfil.php";
    }

    /*===== MODIFICAR- ADMIN   ======*/

    /*muestra los datos a modificar*/
    public function MostrarModificarAdmin(){
        $Llistat = $this->retornaUsuario($_SESSION['idUsuario']);
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

    /*===== MOSTRAR PANEL FAVORITOS  ======*/

    public function PerfilFavoritos(){
        // $Llistat = $this->retornaUsuario($_SESSION['idUsuario']);
        require "../../vistas/usuario/usuario-favoritos.php";
    }

    /*===== OBTENER NIVEL ======*/

    public function NivelUsuario($id){
        return $this->retornaNivelUsuario($id);
    }

    /*===== OBTENER NOMBRE USUARIO ======*/

    public function NombreUsuarioId($id){
        return $this->retornaUserNameId($id);
    }


    /*===== MODIFICAR NIVEL ======*/

    public function DevuelveNivelComentarios($cantidad, $usuario){
        $nivel = $this->retornaNivelUsuario($usuario);
        
        //principiante
        if($cantidad >= 20 && $nivel == "Principiante"){
            $this->CambiarNivel($usuario, "Amateur");
        }

        //Amateur
        if($cantidad >= 40 && $nivel == "Amateur"){
            $this->CambiarNivel($usuario, "Experto");       
        }

        //Moderador
        if($cantidad >= 40 && $nivel == "Experto"){
            $this->CambiarNivel($usuario, "Moderador");       
        }
    }


    /*===== DESHABILITAR USUARIO ======*/

    /*envia la peticion*/
    public function SwitchUser($id, $estado){
        $this->ResultadoSwitch($this->modificaActivo($id, $estado));
    }

    /*muestra el resultado*/
    public function ResultadoSwitch($resultat){
        if ($resultat){
            return true;
        }else{
            return false;
        }
        exit;
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

/*=====  COMPROBAR LOGIN  ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="checkLogin"){
    if(isset($_POST["email"]) && isset($_POST["pass"]) ){

        $usuari = new UsuariosController();
        $row = $usuari->compruebaLogin($_POST["email"], $_POST["pass"]);

        if($row){
            echo'{"exists":true}';
        }
        else{
            //email libre
            echo'{"exists":false}';
        }

    }else{
        echo "Operacion no permitida";
    }
}

/*=====  LOGIN OK - entrar ======*/

if(isset($_POST["operacio"]) && $_POST["operacio"]=="LoginOk"){

    header('Location: ../vistas/index.php   ');
    exit;
}

/*===== REGISTRAR USUARIO ======*/

/*muestra la pagina de añadir*/
if(isset($_GET["operacio"]) && $_GET["operacio"]=="add"){
    header("location: ../vistas/admin/admin-panelUsuarioAdd.php");
}

/*  COMPROBAR EMAIL  */
if(isset($_POST["operacio"]) && $_POST["operacio"]=="checkUserEmail"){
    if(isset($_POST["email"])){
        $usuari = new UsuariosController();
        $row = $usuari->compruebaEmail($_POST["email"]);
        if($row){
            echo'{"exists":true}';
        }
        else{
            //email libre
            echo'{"exists":false}';
        }

    }else{
        echo "Operacion no permitida";
    }
}

/* COMPROBAR USERNAME  */
if(isset($_POST["operacio"]) && $_POST["operacio"]=="checkUserName"){
    if(isset($_POST["nombreUsuario"])){
        $usuari = new UsuariosController();
        $row = $usuari->compruebaUserName($_POST["nombreUsuario"]);

        if($row){
            echo'{"existss":true}';
        }
        else{
            //username libre
            echo'{"existss":false}';
        }

    }else{
        echo "Operacion no permitida";
    }
}

/*añade los datos*/
if(isset($_POST["operacio"]) && $_POST["operacio"]=="AddUser"){
    if (isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["nombreUsuario"])){

        if (!empty($_POST["nombreUsuario"]) && !empty($_POST["email"])){

            $usuari = new UsuariosController();
            $row = $usuari->compruebaUserName($_POST["nombreUsuario"]);

            $email = new UsuariosController();
            $row2 = $email->compruebaEmail($_POST["email"]);

            /*comprobar que no esten repetidos sin JS*/
            if(!$row && !$row2){

                if (!empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["nombreUsuario"])){


                    if(!isset($_POST["rol"]) && empty($_POST["rol"]) || $_POST["rol"]== "user"){
                        $rol = 0;
                    }else{
                        $rol = 1;
                    }

                    /*rol si es admin quien inserta*/
                    if(!isset($_POST["registro"]) && empty($_POST["registro"])){
                        $registro = false;
                    }else{
                        $registro = true;
                    }

                    // echo $_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"], $rol, $registro;

                    $usuari = new UsuariosController();
                    $usuari->LeeInfoUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["email"],$_POST["pass"],$_POST["nombreUsuario"], $rol, $registro);

                }else{
                    echo "Faltan datos";
//header ("location: ../../index.php");
                }
            }else{
                $_SESSION["msgErrAddUser"]= "El usuario o el email que has introducido ya estan en uso";
                header ("location: ../../index.php");
            }

        }else{
            echo "Operacion No permitida";
        }
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


if(isset($_POST['quickVar']) && isset($_POST['id'])){
    $user = $_POST['id'];
    $quickVar = $_POST['quickVar'];

    if($quickVar == 'deshabilitado'){
        $estado = 0;
    }else{
        $estado = 1;
    }

    $usuari = new UsuariosController();
    $res = $usuari->SwitchUser($_POST["id"], $estado);

    echo $quickVar;
}

?>