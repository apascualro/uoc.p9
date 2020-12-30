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
            $sentenciaSQL = "SELECT * FROM tematica ORDER BY idTematica DESC";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    /*===== ADD Tematicas ======*/
    protected function addTematica($nombre){

        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO tematica (idTematica, nombre) VALUES (null, :nombre)";
            $resultado = $conecta->getConexionBD()->prepare($SQL);
            $resultado->execute(array(
                ":nombre" => $this->getNombre()
            ));
            $conecta->getConexionBD()->commit();  
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback(); 
            // return $excepcio->getMessage();
            return null; 
        }
    }

    /*===== MODIFICAR Tematicas ======*/
    protected function editTematica($id, $nombre){

        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE tematica 
            SET          
            nombre = :nombre
            WHERE idTematica = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":nombre" => $this->getNombre()));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return  $excepcio->getMessage();
            // return null;  
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