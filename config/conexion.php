<?php
    session_start();
    class  Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=TicketAFPIntegra","root","1234");

                return $conectar;

            }catch (Exception $e) {
                print "!Error BD: " . $e->getMessage() ."<br/>";
                die();
            }
        }
        //Validacion de caracteres especiales
        public function set_name(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
        //Validacion de rutas
        public static function ruta(){
            return "http://localhost:8080/TicketSisUTP/";
        }
    }


?>