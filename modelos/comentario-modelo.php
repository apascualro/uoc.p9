<?php 

require_once "conexionBD.php";

/**
 * 
 */
class Comentario
{

	/**
     * Class variables
     */
	protected $idComentario;
	protected $juego;
	protected $usuario;
	protected $fecha;
	protected $titulo;
    protected $descripcion;
    protected $tematica;
    protected $originalidad;
    protected $edicion;
    protected $reincidencia;
    protected $escalabilidad;
    protected $azar;    
    protected $visible;


    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->setIdComentario(null);
        $this->setJuego(null);
        $this->setUsuario(null);
        $this->setFecha(null);
        $this->setTitulo(null);
        $this->setDescripcion(null);
        $this->setTematica(null);
        $this->setOriginalidad(null);
        $this->setEdicion(null);
        $this->setReincidencia(null);
        $this->setEscalabilidad(null);
        $this->setAzar(null);
        $this->setVisible(null);
    }


	/**
     * Retornar todos los comentarios
     */
    protected function retornaComentariosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM comentarios";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    /**
     * Retornar los comentarios de un juego
     * @param mixed $idJuego
     */
	protected function retornaComentariosJuego($idJuego){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM comentarios WHERE juego = $idJuego";
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
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    /**
     * @param mixed $idComentario
     *
     * @return self
     */
    public function setIdComentario($idComentario)
    {
        $this->idComentario = $idComentario;

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

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTematica()
    {
        return $this->tematica;
    }

    /**
     * @param mixed $tematica
     *
     * @return self
     */
    public function setTematica($tematica)
    {
        $this->tematica = $tematica;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOriginalidad()
    {
        return $this->originalidad;
    }

    /**
     * @param mixed $originalidad
     *
     * @return self
     */
    public function setOriginalidad($originalidad)
    {
        $this->originalidad = $originalidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdicion()
    {
        return $this->edicion;
    }

    /**
     * @param mixed $edicion
     *
     * @return self
     */
    public function setEdicion($edicion)
    {
        $this->edicion = $edicion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReincidencia()
    {
        return $this->reincidencia;
    }

    /**
     * @param mixed $reincidencia
     *
     * @return self
     */
    public function setReincidencia($reincidencia)
    {
        $this->reincidencia = $reincidencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEscalabilidad()
    {
        return $this->escalabilidad;
    }

    /**
     * @param mixed $escalabilidad
     *
     * @return self
     */
    public function setEscalabilidad($escalabilidad)
    {
        $this->escalabilidad = $escalabilidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAzar()
    {
        return $this->azar;
    }

    /**
     * @param mixed $azar
     *
     * @return self
     */
    public function setAzar($azar)
    {
        $this->azar = $azar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param mixed $visible
     *
     * @return self
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }
}


 ?>