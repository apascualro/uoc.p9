<?php

    class ConexionBD {
        private $conexionBD;

        public function __construct() {

            try{
                $this->conexionBD = new PDO('mysql:host=db5001121598.hosting-data.io; dbname=dbs968610', 'dbu707552', 'BoardGames*2020');
                // $this->conexionBD = new PDO('mysql:host=localhost; dbname=dbs968610', 'root', '');
                $this->conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexionBD->exec("SET CHARACTER SET utf8");
                return $this->conexionBD;
            }catch(Exception $exepcio) {
                echo "<<<< ATENCIÓN >>>>  - ERROR: No se ha podido conectar con la Base de datos porque:<br><br>";
               // echo $exepcio->getMessage();


            }

        }

        public function getConexionBD()
        {
                return $this->conexionBD;
        }
    }

?>

