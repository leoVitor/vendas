<?php
	class Vendas{
		private $id_vendas;
		private $cliente_id_cliente;
		private $data;
		private $valor;
		
		public function __construct(){

		}
		public function setId_Vendas($id_vendas){
			$this->id_vendas = $id_vendas;
		}
		public function setCliente_Id_Cliente($cliente_id_cliente){
			$this->cliente_id_cliente = $cliente_id_cliente;
		}
		public function setData($data){
			$this->data = $data;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function getId_Vendas(){
			return $this->id_vendas;
		}
		public function getCliente_Id_Cliente(){
			return $this->cliente_id_cliente;
		}
		public function getData(){
			return $this->data;
		}
		public function getValor(){
			return $this->valor;
		}
	}
?>