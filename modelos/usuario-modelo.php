<?php

require_once "conexionBD.php";

class Usuario{

    /***ATRIBUTOS***/
    protected $idUsuario;
    protected $nombre;
    protected $apellidos;    
    protected $email;  
    protected $pass; 
    protected $nombreUsuario;
    protected $esAdmin;
    protected $fecha;
    protected $nivel;
    protected $activo;

    /*===== CONSTRUCTOR ======*/
    public function __construct(){
        $this->setidUsuario(null);
        $this->setNombre(null);
        $this->setApellidos(null);
        $this->setEmail(null);
        $this->setPass(null);
        $this->setNombreUsuario(null);
        $this->setEsAdmin(null);
        $this->setFecha(null);
        $this->setNivel(null);
        $this->setActivo(null);       
    }

    /*===== REGISTRAR USUARIO ======*/
    protected function registraUsuario($nombre, $apellidos, $email, $pass, $nombreUsuario, $rol){
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setEmail($email);
        $this->setPass($pass);
        $this->setNombreUsuario($nombreUsuario);
        $this->setEsAdmin($rol);
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO usuarios (idUsuario, nombre, apellidos, email, password, nombreUsuario, es_admin, creado, nivel, es_activo) 
            VALUES (null, :email, :pass, :nombre, :apellidos, :nombreUsuario, :es_admin, NOW(), 'Principiante', TRUE )";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                ":email" => $this->getEmail(),
                ":pass" => $this->getPass(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":nombreUsuario" => $this->getNombreUsuario(),
                ":es_admin" => $this->getEsAdmin(),
            ));
            $conecta->getConexionBD()->commit();  
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            return false; 
        }
    }

    /*===== RETORNAR USUARIOS - TODO======*/
    protected function retornaUsuariosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*===== RETORNAR USUARIOS TODO-> id ======*/
    protected function retornaUsuario($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
            WHERE idUsuario = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*=====  COMPROBAR LOGIN  ======*/
        protected function retornaLogin($email, $pass){
            try{
                $conecta = new ConexionBD();
                $conecta->getConexionBD()->beginTransaction();
                $sentenciaSQL = "SELECT * FROM usuarios
                WHERE email = '$email' AND password = $pass";
                $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
                $intencio->execute();
                return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $excepcio){
                $conecta->getConexionBD()->rollback();  
                return null;  
            }
        }

    /*===== RETORNAR nivel USUARIO ->id ======*/
    protected function retornaNivelUsuario($usuario){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT nivel FROM usuarios
            WHERE idUsuario = '$usuario'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*===== MODIFICAR NIVEL ======*/
    protected function CambiarNivel($id, $nivel){
       
        $this->setNivel($nivel);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
            SET          
            nivel = :nivel
            WHERE idUsuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":nivel" => $this->getNivel()));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            // return  $excepcio->getMessage();  
            return null;
        }   
    }

    /*===== MODIFICAR USUARIOS ======*/
    protected function modificaUsuari($id, $email, $pass, $nombre, $apellidos, $nombreUsuario, $esAdmin, $fecha, $nivel, $activo){
        $this->setEmail($email);
        $this->setPass($pass);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setNombreUsuario($nombreUsuario);
        $this->setEsAdmin($esAdmin);
        $this->setFecha($fecha);
        $this->setNivel($nivel);
        $this->setActivo($activo);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
            SET  
            nombre = :nombre,
            apellidos = :apellidos,
            email = :email,
            password = :pass,            
            nombreUsuario = :nombreUsuario,
            es_admin = :esAdmin,
            creado = :fecha,
            nivel = :nivel,
            es_activo = :activo
            WHERE idUsuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":pass" => $this->getPass(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
                ":nombreUsuario" => $this->getNombreUsuario(),
                ":esAdmin"=> $this->getEsAdmin(),
                ":fecha"=> $this->getFecha(),
                ":nivel"=> $this->getNivel(),
                ":activo"=> $this->getActivo()
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            // return  $excepcio->getMessage(); 
            return null; 
        }   
    }

    /*===== MODIFICAR ADMIN ======*/
    protected function modificarAdministrador($id, $email, $nombre, $apellidos){
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
            SET  email = :email,
            nombre = :nombre,
            apellidos = :apellidos
            WHERE idUsuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":email" => $this->getEmail(),
                ":nombre" => $this->getNombre(),
                ":apellidos" => $this->getApellidos(),
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            // return  $excepcio->getMessage();  
            return null;
        }
    }

    /*=====  COMPROBAR EXISTE EMAIL -> email ======*/
    protected function retornaEmail($email){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
            WHERE email = '$email'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*=====  COMPROBAR EXISTE NOMBREUSUARIO -> nombreUsuario ======*/
    protected function retornaUserName($nombreUsuario){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM usuarios
            WHERE nombreUsuario = '$nombreUsuario'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*=====  RETORNAR NOMBREUSUARIO -> id ======*/
    protected function retornaUserNameId($id){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT nombreUsuario FROM usuarios
            WHERE idUsuario = '$id'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    /*===== MODIFICAR ESTADO USUARIO ======*/
    protected function modificaActivo($id, $activo){

        $this->setActivo($activo);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE usuarios 
            SET  
            es_activo = :activo
            WHERE idUsuario = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":activo"=> $this->getActivo()
            ));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            // return  $excepcio->getMessage(); 
            return null; 
        }   
    }

    

    /***getters and setters***/
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getPass()
    {
        return $this->pass;
    }


    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }


    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }


    public function getEsAdmin()
    {
        return $this->esAdmin;
    }

    public function setEsAdmin($esAdmin)
    {
        $this->esAdmin = $esAdmin;

        return $this;
    }


    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }


    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }



    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }
}


?>