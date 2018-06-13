<?php
    class Veiculo{
    	private $id_veiculo;
    	private $modelo;
    	private $ano;
    	private $placa;
    	private $chassi;
		private $preco;
		
        public function __construct(){
            
        }

    	public function setId_veiculo($id_veiculo){
    		$this->id_veiculo = $id_veiculo;
    	}
    	public function setModelo($modelo){
    		$this->modelo = $modelo;
    	}
    	public function setAno($ano){
    		$this->ano = $ano;
    	}
    	public function setPlaca($placa){
    		$this->placa = $placa;
    	}
    	public function setChassi($chassi){
    		$this->chassi = $chassi;
    	}
    	public function setPreco($preco){
    		$this->preco = $preco;
    	}
    	
    	public function getId_veiculo(){
    		return $this->id_veiculo;
    	}
    	public function getModelo(){
    		return $this->modelo;
    	}
    	public function getAno(){
    		return $this->ano;
    	}
    	public function getPlaca(){
    		return $this->placa;
    	}
    	public function getChassi(){
    		return $this->chassi;
    	}
    	public function getPreco(){
    		return $this->preco;
    	}

    }
?>