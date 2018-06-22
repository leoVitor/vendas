<?php 
    class Conexao{
        private $servername="localhost";
        private $username="root";
        private $password="24131516";
        private $database="mydb";

        public function connection(){
            $con = new mysqli($this->servername,$this->username,$this->password,$this->database);

            if($con->connect_error){
                die("Erro ao conectar ".$con->connect_error);
            }

            return $con;
        }
    }




?>