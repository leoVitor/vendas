<?php
	require_once "../class/produto.class.php";
	require_once "../con/conexao.class.php";
	class DaoEstado{
		public static function save($produto){
			$conexao = New Conexao();
			$sql = "INSERT INTO `produto`(`nome`, `valor`) VALUES (?,?)";
			$con = $conexao->connecation();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss',$nome,$valor);
			$nome = $estado->getNome();
			$uf = $estado->getValor();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
	}
?>