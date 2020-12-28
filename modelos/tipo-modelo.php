<?php 
require_once "conexionBD.php";


class Tipo{
	
	protected $idTipo;
	protected $nombre;

	public function __construct()
	{
		$this->setIdTipo(null);
        $this->setNombre(null);
    }


    /*===== RETORNAR TODAS TipoS ======*/
    protected function retornaTiposTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM tipo ORDER BY idTipo DESC";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    /*===== ADD Tipos ======*/
    protected function addTipo($nombre){

        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO tipo (idTipo, nombre) VALUES (null, :nombre)";
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

    /*===== MODIFICAR Tipos ======*/
    protected function editTipo($id, $nombre){
       
        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE tipo 
            SET          
            nombre = :nombre
            WHERE idTipo = $id";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute(array(
                ":nombre" => $this->getNombre()));
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            // return  $excepcio->getMessage();
            return null;  
        }   
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param mixed $idTipo
     *
     * @return self
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

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