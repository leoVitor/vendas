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
	}
?>