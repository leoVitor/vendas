<?php

    class Cidade{

        private $id_cidade;
        private $nome;
        private $sigla;
        private $estado_id_estado;
        private $uf;

        
        public function __construct(){
            
        }
        
        public function getId_cidade()
        {
            return $this->id_cidade;
        }
        public function setId_cidade($id_cidade)
        {
            $this->id_cidade = $id_cidade;
        }

        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getSigla()
        {
            return $this->sigla;
        }
        public function setSigla($sigla)
        {
            $this->sigla = $sigla;
        }

        public function getEstado_id_estado()
        {
            return $this->estado_id_estado;
        }
        public function setEstado_id_estado($estado_id_estado)
        {
            $this->estado_id_estado = $estado_id_estado;
        }
    }

?>