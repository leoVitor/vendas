<?php
    class Veiculo{
    	private $idveiculo;
    	private $modelo;
    	private $ano;
    	private $placa;
    	private $chassi;
		private $preco;
		
        public function __construct(){
            
        }

    	public function setIdveiculo($idveiculo){
    		$this->idveiculo = $idveiculo;
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
    	
    	public function getIdveiculo(){
    		return $this->idveiculo;
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