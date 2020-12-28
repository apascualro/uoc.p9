<?php 
require_once "conexionBD.php";


class Categoria{
	
	protected $idCategoria;
	protected $nombre;

	public function __construct()
	{
		$this->setIdCategoria(null);
        $this->setNombre(null);
	}


	/*===== RETORNAR TODAS CATEGORIAS ======*/
    protected function retornaCategoriasTodas(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM categoria";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }


    /*===== ADD Categoria ======*/
    protected function addCategoria($nombre){

        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $SQL = "INSERT INTO categoria (idCategoria, nombre) VALUES (null, :nombre)";
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

    /*===== MODIFICAR Categoria ======*/
    protected function editCategoria($id, $nombre){
       
        $this->setNombre($nombre);

        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE categoria 
            SET          
            nombre = :nombre
            WHERE idCategoria = $id";
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
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     *
     * @return self
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

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