<?php
    class Estado{

        private $id_estado;
        private $nome;
        private $uf;

        public function __construct(){

        }       
        
        public function getId_estado()
        {
            return $this->id_estado;
        }
        public function setId_estado($id_estado)
        {
            $this->id_estado = $id_estado;
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        
        public function getUf()
        {
            return $this->uf;
        } 
        public function setUf($uf)
        {
            $this->uf = $uf;
        }

    }

?>