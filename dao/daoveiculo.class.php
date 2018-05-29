<?php
	require_once "../class/veiculo.class.php";
	require_once "../con/conexao.class.php";
	class DaoVeiculo{
		public static function save($veiculo){
			$conexao = New Conexao();
			$sql = "INSERT INTO `veiculo`(`modelo`, `ano`, `placa`, `chassi`, `preco`) VALUES (?,?,?,?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('sssss',$modelo,$ano,$placa,$chassi,$preco);
			$modelo = $veiculo->getModelo();
			$ano = $veiculo->getAno();
			$placa = $veiculo->getPlaca();
			$chassi = $veiculo->getChassi();
			$preco = $veiculo->getPreco();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
		public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `idveiculo`, `modelo`, `ano`, `placa`, `chassi`, `preco` FROM `veiculo` ORDER BY `modelo` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $veiculo = new Veiculo();
                    $veiculo->setId_Veiculo($row['idveiculo']);
                    $veiculo->setModelo($row['modelo']);
					$veiculo->setAno($row['ano']);
					$veiculo->setPlaca($row['placa']);
					$veiculo->setChassi($row['chassi']);
					$veiculo->setPreco($row['preco']);
                    array_push($retorno,$veiculo);
                }
            }
            $con->close();
            return $retorno;
		}
		public function busca($id){
            $conexao = new Conexao(); 
            $veiculo  = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `idveiculo`, `modelo`, `ano`, `placa`, `chassi`, `preco` FROM `veiculo` WHERE `idveiculo` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $veiculo = new Veiculo();
					$id = $row['idveiculo'];
					$modelo = $row['modelo'];
					$ano = $row['ano'];
					$placa = $row['placa'];
					$chassi = $row['chassi'];
					$preco = $row['preco'];
    
                    $veiculo->setModelo($modelo);
					$veiculo->setAno($ano);
					$veiculo->setPlaca($placa);
					$veiculo->setChassi($chassi);
					$veiculo->setPreco($preco);
                    $veiculo->setId_Veiculo($id);
    
                }
			}
			
            $con->close();
            return $veiculo;
		}
	}
?>