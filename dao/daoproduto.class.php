<?php
	require_once "../class/produto.class.php";
	require_once "../con/conexao.class.php";
	class DaoProduto{
		public static function save($produto){
			$conexao = New Conexao();
			$sql = "INSERT INTO `produto`(`nome`, `valor`) VALUES (?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss',$nome,$valor);
			$nome = $produto->getNome();
			$uf = $produto->getValor();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
	}
?>