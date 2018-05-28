<?php
	require_once "../class/cliente.class.php";
	require_once "../con/conexao.class.php";
	class DaoCliente{
		public static function save($cliente){
			$conexao = New Conexao();
			$sql = "INSERT INTO `cliente`(`nome`, `cpf`, `nascimento`, `rg`, `telefone`, `email`, `endereco_idendereco`, `veiculo_idveiculo`) 
                    VALUES (?,?,?,?,?,?,?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
            $stmt->bind_param('ssssssii',$nome,$cpf,$nascimento,$rg,$telefone,
                                        $email,$endereco_id_endereco,$veiculo_id_veiculo);
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$nascimento = $cliente->getNascimento();
			$rg = $cliente->getRg();
            $telefone = $cliente->getTelefone();
            $email = $cliente->getEmail();
            $endereco_id_endereco->getEndereco_Id_Endereco();
            $veiculo_id_veiculo->getVeiculo_Id_Veiculo();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
	}
?>