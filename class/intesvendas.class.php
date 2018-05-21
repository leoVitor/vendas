<?php
	class ItensVendas{
		private $id_intensvendas;
		private $vendas_id_vendas;
		private $produto_id_produto;
		private $quantidade;
		private $valor;

		public function __construct(){

		}

		public function setId_Itensvendas($id_intensvendas){
			$this->id_intensvendas = $id_intensvendas;
		}
		public function setVendas_Id_vendas($vendas_id_vendas){
			$this->vendas_id_vendas = $vendas_id_vendas;
		}
		public function setProduto_Id_Produto($produto_id_produto){
			$this->produto_id_produto = $produto_id_produto;
		}
		public function setQuantidade($quantidade){
			$this->quantidade =$quantidade;
		}
		public function setValor($valor){
			$this->valor = $valor;
		}
		public function getId_Itensvendas(){
			return $this->id_intensvendas;
		}
		public function getVendas_Id_Vendas(){
			return $this->vendas_id_vendas;
		}
		public function getProduto_Id_Produto(){
			return $this->produto_id_produto;
		}
		public function getQuantidade(){
			return $this->quantidade;
		}
		public function getValor(){
			return $this->valor;
		}
	}
?>