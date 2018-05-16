<?php

    class Produto{

        private $id_produto;
        private $nome;
        private $valor;

        public function getId_produto()
        {
            return $this->id_produto;
        }
        public function setId_produto($id_produto)
        {
            $this->id_produto = $id_produto;
        }
 
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getValor()
        {
            return $this->valor;
        }
        public function setValor($valor)
        {
            $this->valor = $valor;
        }
    }

?>