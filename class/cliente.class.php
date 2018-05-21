<?php
	class Cliente{
		private $id_cliente;
		private $nome;
		private $cpf;
		private $nascimento;
		private $rg;
		private $telefone;
		private $email;
		private $endereco_id_endereco;
		private $veiculo_id_veiculo;

		public function __construct(){

		}

		public function setId_Cliente($id_cliente){
			$this->id_cliente = $id_cliente;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		public function setNascimento($nascimento){
			$this->nascimento = $nascimento;
		}
		public function setRg($rg){
			$this->rg = $rg;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setEndereco_Id_Endereco($endereco_id_endereco){
			$this->endereco_id_endereco = $endereco_id_endereco;
		}
		public function setVeiculo_Id_Veiculo($veiculo_id_veiculo){
			$this->veiculo_id_veiculo = $veiculo_id_veiculo;
		}
		public function getId_Cliente(){
			return $this->id_cliente;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getCpf(){
			return $this->cpf;
		}
		public function getNascimento(){
			return $this->nascimento;
		}
		public function getRg(){
			return $this->rg;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getEndereco_Id_Endereco(){
			return $this->endereco_id_endereco;
		}
		public function getVeiculo_Id_Veiculo(){
			return $this->veiculo_id_veiculo;
		}
	}
?>