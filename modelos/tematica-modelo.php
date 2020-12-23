<?php 
require_once "conexionBD.php";


class Tematica{
	
	protected $idTematica;
	protected $nombre;

	public function __construct()
	{
		$this->setIdTematica(null);
        $this->setNombre(null);
	}


	/*===== RETORNAR TODAS TematicaS ======*/
    protected function retornaTematicasTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM tematica";
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
    public function getIdTematica()
    {
        return $this->idTematica;
    }

    /**
     * @param mixed $idTematica
     *
     * @return self
     */
    public function setIdTematica($idTematica)
    {
        $this->idTematica = $idTematica;

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
}


 ?>