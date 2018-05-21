<?php
	require_once "../class/estado.class.php";
	require_once "../con/conexao.class.php";
	class DaoEstado{
		public static function save($estado){
			$conexao = New Conexao();
			$sql = "INSERT INTO `estado`(`nome`, `uf`) VALUES (?,?)";
			$con = $conexao->connecation();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss',$nome,$uf);
			$nome = $estado->getNome();
			$uf = $estado->getUf();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
	}
?>