<?php

require_once "conexionBD.php";

class Juego{

	/***ATRIBUTOS***/
	protected $idJuego;
	protected $nombre;
	protected $subtitulo;
	protected $descripcion;
	protected $autor;
	protected $year;
	protected $distribuidora;
	protected $edad;
	protected $tiempo;
	protected $medidas;
	protected $complejidad;	
	protected $valoracion;
	protected $op_originalidad;
	protected $op_tematica;
	protected $op_edicion;
	protected $op_reincidencia;	
	protected $op_escalabilidad;
	protected $op_azar;	
	protected $tipo;
	protected $categoria;	
	protected $tematica;
	protected $es_activo;

	/*** CONSTRUCTOR ***/
	public function __construct(){
		$this->setIdJuego(null);
		$this->setNombre(null);
		$this->setSubtitulo(null);
		$this->setDescripcion(null);
		$this->setAutor(null);
		$this->setYear(null);		
		$this->setDistribuidora(null);
		$this->setEdad(null);		
		$this->setTiempo(null);
		$this->setMedidas(null);
		$this->setComplejidad(null);
		$this->setValoracion(null);
		$this->setOpOriginalidad(null);
		$this->setOpTematica(null);
		$this->setOpEdicion(null);
		$this->setOpReincidencia(null);
		$this->setOpAzar(null);
		$this->setTipo(null);		
		$this->setCategoria(null);
		$this->setTematica(null);
	}


	/*** AÑADIR JUEGO ***/
	protected function añadirJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $valoracion, $op_originalidad, $op_tematica, $op_edicion, $op_reincidencia, $op_azar, $tipo, $categoria, $tematica, $es_activo){
		$this->setIdJuego($idJuego);
		$this->setNombre($nombre);
		$this->setSubtitulo($subtitulo);
		$this->setDescripcion($descripcion);
		$this->setAutor($autor);
		$this->setYear($year);		
		$this->setDistribuidora($distribuidora);
		$this->setEdad($edad);		
		$this->setTiempo($tiempo);
		$this->setMedidas($medidas);
		$this->setComplejidad($complejidad);
		$this->setValoracion($valoracion);
		$this->setOpOriginalidad($op_originalidad);
		$this->setOpTematica($op_tematica);
		$this->setOpEdicion($op_edicion);
		$this->setOpReincidencia($op_reincidencia);
		$this->setOpAzar($op_azar);
		$this->setTipo($tipo);		
		$this->setCategoria($categoria);
		$this->setTematica($tematica);
		try{    
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$SQL = "INSERT INTO juegos (idJuego, nombre, subtitulo, descripcion, autor, year, distribuidora, edad, tiempo, medidas, complejidad, valoracion, op_originalidad, op_tematica, op_edicion, op_reincidencia, op_azar, tipo, categoria, tematica)
			VALUES (null, :nombre, :subtitulo, :descripcion, :autor, :year, :distribuidora, :edad, :tiempo, :medidas, :complejidad, 0, 0, 0, 0, 0, 0, :tipo, :categoria, :tematica)";
			$resultado = $conecta->getConexionBD()->prepare($SQL);
			$resultado->execute(array(
				":nombre" => $this->getNombre(),
				":subtitulo" => $this->getSubtitulo(),
				":descripcion" => $this->getDescripcion(),
				":autor" => $this->getAutor(),
				":year" => $this->getYear(),
				":distribuidora" => $this->getDistribuidora(),
				":edad" => $this->getEdad(),
				":tiempo" => $this->getTiempo(),
				":medidas" => $this->getMedidas(),
				":complejidad" => $this->getComplejidad(),
				":tipo" => $this->getTipo(),
				":categoria" => $this->getCategoria(),
				":tematica" => $this->getTematica(),
			));
			$conecta->getConexionBD()->commit();  
			return true;
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback(); 
			return false; 
		}
	}

	/*** RETORNAR JUEGO - TODO***/
	protected function retornaJuegosTodos(){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM juegos";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
		}
	}

	/*** RETORNAR JUEGO - ID***/
	protected function retornaJuego($id){
		try{
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$sentenciaSQL = "SELECT * FROM juegos WHERE idJuego = $id";
			$intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
			$intencio->execute();
			$conecta->getConexionBD()->commit();
			return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback();  
			return null;  
		}
	}

	/*** EDITAR JUEGO ***/
	protected function editarJuego($idJuego, $nombre, $subtitulo, $descripcion, $autor, $year, $distribuidora, $edad, $tiempo, $medidas, $complejidad, $tipo, $categoria, $tematica, $es_activo){
		$this->setIdJuego($idJuego);
		$this->setNombre($nombre);
		$this->setSubtitulo($subtitulo);
		$this->setDescripcion($descripcion);
		$this->setAutor($autor);
		$this->setYear($year);		
		$this->setDistribuidora($distribuidora);
		$this->setEdad($edad);		
		$this->setTiempo($tiempo);
		$this->setMedidas($medidas);
		$this->setComplejidad($complejidad);
		$this->setTipo($tipo);		
		$this->setCategoria($categoria);
		$this->setTematica($tematica);
		$this->setEsActivo($es_activo);
		try{    
			$conecta = new ConexionBD();
			$conecta->getConexionBD()->beginTransaction();
			$SQL = "UPDATE juegos SET  
			nombre = :nombre,
			subtitulo = :subtitulo,
			descripcion = :descripcion,
			autor = :autor,
			year = :year,
			distribuidora = :distribuidora,
			edad = :edad,
			tiempo = :tiempo,
			medidas = :medidas,
			complejidad = :complejidad,
			tipo = :tipo,
			categoria = :categoria,
			tematica = :tematica,
			es_activo = :es_activo
			WHERE idJuego = :idJuego";
			$resultado = $conecta->getConexionBD()->prepare($SQL);
			$resultado->execute(array(
				":idJuego" => $this->getIdJuego(),
				":nombre" => $this->getNombre(),
				":subtitulo" => $this->getSubtitulo(),
				":descripcion" => $this->getDescripcion(),
				":autor" => $this->getAutor(),
				":year" => $this->getYear(),
				":distribuidora" => $this->getDistribuidora(),
				":edad" => $this->getEdad(),
				":tiempo" => $this->getTiempo(),
				":medidas" => $this->getMedidas(),
				":complejidad" => $this->getComplejidad(),
				":tipo" => $this->getTipo(),
				":categoria" => $this->getCategoria(),
				":tematica" => $this->getTematica(),				
				":es_activo" => $this->getEsActivo(),
			));
			$conecta->getConexionBD()->commit();  
			return true;
		}catch(Exception $excepcio){
			$conecta->getConexionBD()->rollback(); 
			return false; 
		}
	}
	


	/***getters and setters***/
	public function getIdJuego()
	{
		return $this->idJuego;
	}


	public function setIdJuego($idJuego)
	{
		$this->idJuego = $idJuego;

		return $this;
	}


	public function getNombre()
	{
		return $this->nombre;
	}


	public function setNombre($nombre)
	{
		$this->nombre = $nombre;

		return $this;
	}


	public function getSubtitulo()
	{
		return $this->subtitulo;
	}


	public function setSubtitulo($subtitulo)
	{
		$this->subtitulo = $subtitulo;

		return $this;
	}


	public function getDescripcion()
	{
		return $this->descripcion;
	}


	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;

		return $this;
	}


	public function getAutor()
	{
		return $this->autor;
	}


	public function setAutor($autor)
	{
		$this->autor = $autor;

		return $this;
	}


	public function getYear()
	{
		return $this->year;
	}


	public function setYear($year)
	{
		$this->year = $year;

		return $this;
	}


	public function getDistribuidora()
	{
		return $this->distribuidora;
	}


	public function setDistribuidora($distribuidora)
	{
		$this->distribuidora = $distribuidora;

		return $this;
	}


	public function getEdad()
	{
		return $this->edad;
	}


	public function setEdad($edad)
	{
		$this->edad = $edad;

		return $this;
	}


	public function getTiempo()
	{
		return $this->tiempo;
	}


	public function setTiempo($tiempo)
	{
		$this->tiempo = $tiempo;

		return $this;
	}


	public function getMedidas()
	{
		return $this->medidas;
	}


	public function setMedidas($medidas)
	{
		$this->medidas = $medidas;

		return $this;
	}


	public function getComplejidad()
	{
		return $this->complejidad;
	}


	public function setComplejidad($complejidad)
	{
		$this->complejidad = $complejidad;

		return $this;
	}


	public function getValoracion()
	{
		return $this->valoracion;
	}


	public function setValoracion($valoracion)
	{
		$this->valoracion = $valoracion;

		return $this;
	}


	public function getOpOriginalidad()
	{
		return $this->op_originalidad;
	}


	public function setOpOriginalidad($op_originalidad)
	{
		$this->op_originalidad = $op_originalidad;

		return $this;
	}


	public function getOpTematica()
	{
		return $this->op_tematica;
	}


	public function setOpTematica($op_tematica)
	{
		$this->op_tematica = $op_tematica;

		return $this;
	}


	public function getOpEdicion()
	{
		return $this->op_edicion;
	}


	public function setOpEdicion($op_edicion)
	{
		$this->op_edicion = $op_edicion;

		return $this;
	}


	public function getOpReincidencia()
	{
		return $this->op_reincidencia;
	}


	public function setOpReincidencia($op_reincidencia)
	{
		$this->op_reincidencia = $op_reincidencia;

		return $this;
	}


	public function getOpAzar()
	{
		return $this->op_azar;
	}


	public function setOpAzar($op_azar)
	{
		$this->op_azar = $op_azar;

		return $this;
	}


	public function getTipo()
	{
		return $this->tipo;
	}


	public function setTipo($tipo)
	{
		$this->tipo = $tipo;

		return $this;
	}


	public function getCategoria()
	{
		return $this->categoria;
	}


	public function setCategoria($categoria)
	{
		$this->categoria = $categoria;

		return $this;
	}


	public function getTematica()
	{
		return $this->tematica;
	}


	public function setTematica($tematica)
	{
		$this->tematica = $tematica;

		return $this;
	}

	public function getEsActivo()
	{
		return $this->es_activo;
	}


	public function setEsActivo($es_activo)
	{
		$this->es_activo = $es_activo;

		return $this;
	}
}


?>