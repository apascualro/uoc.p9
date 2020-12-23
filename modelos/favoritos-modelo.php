<?php 
require_once "usuario-modelo.php";
require_once "juego-modelo.php";
require_once "conexionBD.php";

/**
 * 
 */
class Valoracion
{

	/*=====  ATRIBUTOS ======*/
	protected $usuario;
	protected $juego;

	/*=====  CONSTRUCTOR ======*/
	function __construct()
	{
		$this->setJuego(null);
		$this->setUsuario(null);
	}


	/*=====  RETORNAR VALORACION - juego======*/
	protected function retornaFavoritos($id){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT juego FROM favoritos WHERE usuario = $usuario";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			return $resultat = $intencio->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
		}
	}


    /*=====  AÑADE VALORACION ======*/
    protected function addFavorito($juego, $usuario){

        $this->setJuego($juego);
        $this->setUsuario($usuario);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO favoritos (usuario, juego)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(                
                ":usuario" => $this->getUsuario(),
                ":juego" => $this->getJuego(),
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


    ?>