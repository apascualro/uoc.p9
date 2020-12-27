<?php 

require_once "conexionBD.php";

class Imagen {

	/*** ATRIBUTOS ***/
	protected $idImagen;
	protected $juego;
	protected $nombre;
	protected $fecha;
	protected $es_portada;

	
	/*** CONSTRUCTOR ***/
	function __construct()
	{
		$this->setIdImagen(null);
		$this->setJuego(null);
		$this->setNombre(null);
		$this->setFecha(null);
		$this->setEsPortada(null);
	}

	/*** AÑADIR IMAGEN ***/
	protected function añadirImagen($juego, $nombre, $es_portada){
		$this->setJuego($juego);
		$this->setNombre($nombre);
		$this->setEsPortada($es_portada);
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$SQL = "INSERT INTO imagenes (idImagen, juego, nombre, fecha, es_portada)
			VALUES (null, :juego, :nombre, NOW(), :es_portada)";
			$resultado = $conecta->getConexionBD()->prepare($SQL);
			$resultado->execute(array(
				":juego" => $this->getJuego(),
				":nombre" => $this->getNombre(),
				":es_portada" => $this->getEsPortada(),
			));
			$conecta->getConexionBD()->commit();  
			return true;
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback(); 
			return false; 
		}
	}

    /*** AÑADIR IMAGEN SUBIR ***/
    protected function linkarImagen($array, $juego){

        $this->setJuego($juego);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO imagenes (juego, nombre, fecha, es_portada) VALUES ";

            foreach ($array as $key) {
                $SQL .="('$juego', '".$key."', NOW(), 0),";
            }
            $SQL = rtrim($SQL, ',');
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute();
            $conecta->getConexionBD()->commit();  
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            echo $excepcio->getMessage();
            return false; 
        }
    }

	/*** RETORNAR IMAGEN - TODO***/
	protected function retornaImagenes($id){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM imagenes WHERE juego = $id";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
		}
	}

	/*** RETORNAR IMAGEN - portada***/
	protected function retornaImagenPortada($id){
		$estado = "1";
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT nombre FROM imagenes 
                                            WHERE juego = $id
                                            AND es_portada = '1'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchColumn();
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();   
            return null;  
        }
    }



	/***getters and setters***/
    /**
     * @return mixed
     */
    public function getIdImagen()
    {
    	return $this->idImagen;
    }

    /**
     * @param mixed $idImagen
     *
     * @return self
     */
    public function setIdImagen($idImagen)
    {
    	$this->idImagen = $idImagen;

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
    public function getNombre()
    {
    	return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
    	$this->nombre = $nombre;

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
    public function getEsPortada()
    {
    	return $this->es_portada;
    }

    /**
     * @param mixed $es_portada
     *
     * @return self
     */
    public function setEsPortada($es_portada)
    {
    	$this->es_portada = $es_portada;

    	return $this;
    }
}
?>