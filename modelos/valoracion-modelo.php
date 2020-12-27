<?php 
require_once "usuario-modelo.php";
require_once "conexionBD.php";

/**
 * 
 */
class Valoracion
{

	/*=====  ATRIBUTOS ======*/
	protected $idValoracion;
	protected $juego;
	protected $usuario;
	protected $puntuacion;
	protected $fecha;


	/*=====  CONSTRUCTOR ======*/
	function __construct()
	{
		$this->setIdValoracion(null);
		$this->setJuego(null);
		$this->setUsuario(null);
		$this->setPuntuacion(null);
		$this->setFecha(null);
	}


	/*=====  RETORNAR VALORACION - juego======*/
	protected function retornaValoracion($juego){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM valoraciones WHERE juego = $juego";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
		}
	}

    /*=====  RETORNAR VALORACION - juego + usuario ======*/
    protected function retornaValoracionUsuario($juego, $usuario){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones WHERE juego = $juego AND usuario = $usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();   
        }
    }


    /*=====  RETORNAR VALORACION - usuario ======*/
    protected function retornaCantidadValoraciones($usuario){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM valoraciones WHERE usuario = $usuario";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();   
        }
    }

    
    /*=====  AÑADE VALORACION ======*/
    protected function addValoracion($puntuacion, $juego, $usuario){
        $this->setPuntuacion($puntuacion);
        $this->setJuego($juego);
        $this->setUsuario($usuario);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO valoraciones (idValoracion, juego, usuario, puntuacion, fecha)
            VALUES (null, :juego, :usuario, :puntuacion, NOW())";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                ":juego" => $this->getJuego(),
                ":usuario" => $this->getUsuario(),
                ":puntuacion" => $this->getPuntuacion(),
            ));
            $conecta->getConexionBD()->commit();  
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            return false; 
        }
    }


    /*=====  EDITA VALORACION ======*/
    protected function changeValoracion($puntuacion, $juego, $usuario){
        $this->setPuntuacion($puntuacion);
        $this->setJuego($juego);
        $this->setUsuario($usuario);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "UPDATE valoraciones 
                            SET puntuacion = :puntuacion 
                            WHERE juego = :juego AND usuario = :usuario";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                ":juego" => $this->getJuego(),
                ":usuario" => $this->getUsuario(),
                ":puntuacion" => $this->getPuntuacion(),
            ));
            $conecta->getConexionBD()->commit();  
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            return false; 
        }
    }


    /*=====  RETORNAR VALORACION y NIVEL // INNER JOIN ======*/
    protected function retornaValoracionNivel($juego){
        $this->setJuego($juego);
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT a.puntuacion, b.nivel 
                            FROM valoraciones a
                            INNER JOIN usuarios b ON a.usuario = b.idUsuario
                            WHERE juego = :juego";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":juego" => $this->getJuego()));
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();  
        }
    }




    /**
     * @return mixed
     */
    public function getIdValoracion()
    {
        return $this->idValoracion;
    }

    /**
     * @param mixed $idValoracion
     *
     * @return self
     */
    public function setIdValoracion($idValoracion)
    {
        $this->idValoracion = $idValoracion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJuego()
    {
        return $this->juego;
    }

    /**
     * @param mixed $juego
     *
     * @return self
     */
    public function setJuego($juego)
    {
        $this->juego = $juego;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * @param mixed $puntuacion
     *
     * @return self
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}


?>