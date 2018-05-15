<?php
	class Usuario{
		private $idusuario;
		private $nome;
		private $email;
		private $senha;
		private $sobrenome;
		private $administrador;

		public function setIdusuario($idusuario){
			$this->idusuario = $idusuario;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		public function setAdministrador($administrador){
			$this->administrador = $administrador;
		}
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function getAdministrador(){
			return $this->administrador;
		}
	}
?>