<?php 
require_once "conexionBD.php";


class Nivel{
	
	protected $idNivel;
	protected $nombre;

	public function __construct()
	{
		$this->setIdNivel(null);
        $this->setNombre(null);
	}


	/*===== RETORNAR TODAS CATEGORIAS ======*/
    protected function retornaNiveles(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM nivel";
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
    public function getIdNivel()
    {
        return $this->idNivel;
    }

    /**
     * @param mixed $idNivel
     *
     * @return self
     */
    public function setIdNivel($idNivel)
    {
        $this->idNivel = $idNivel;

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