<?php

    class Endereco{

        private $id_endereco;
        private $logradouro;
        private $cep;
        private $numero;
        private $complemento;
        private $cidade_id_cidade;

        public function __construct(){
        	
        }

        public function setId_Endereco($id_endereco){
        	$this->id_endereco = $id_endereco;
        }
        public function setLogradouro($logradouro){
        	$this->logradouro = $logradouro;
        }
        public function setCep($cep){
        	$this->cep = $cep;
        }
        public function setNumero($numero){
        	$this->numero = $numero;
        }
        public function setComplemento($complemento){
        	$this->complemento = $complemento;
        }
        public function setCidade_Id_Cidade($cidade_id_cidade){
        	$this->cidade_id_cidade = $cidade_id_cidade;
        }
        public function getId_Endereco(){
        	return $this->id_endereco;
        }
        public function getLogradouro(){
        	return $this->logradouro;
        }
        public function getCep(){
        	return $this->cep;
        }
        public function getNumero(){
        	return $this->numero;
        }
        public function getComplemento(){
        	return $this->complemento;
        }
        public function getCidade_Id_Cidade(){
        	return $this->cidade_id_cidade;
        }
    }


?>