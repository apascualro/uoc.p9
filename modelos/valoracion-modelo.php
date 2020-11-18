<?php 

require_once "conexionBD.php";

/**
 * 
 */
class Valoracion
{

	/*** ATRIBUTOS ***/
	protected $idValoracion;
	protected $juego;
	protected $usuario;
	protected $puntuacion;
	protected $fecha;


	/*** CONSTRUCTOR ***/
	function __construct()
	{
		$this->setIdValoracion(null);
		$this->setJuego(null);
		$this->setUsuario(null);
		$this->setPuntuacion(null);
		$this->setFecha(null);
	}


	/*** RETORNAR VALORACION - TODO***/
	protected function retornaValoracion($id){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM valoraciones WHERE juego = $id";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
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