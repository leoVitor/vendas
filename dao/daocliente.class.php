<?php
	require_once "../con/conexao.class.php";
	require_once "../class/cliente.class.php";
	class DaoCliente{
		public function save($cliente){
			try{

				$retorno = true;
				$conexao = new Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `cliente`(`nome`, `cpf`, `nascimento`, `rg`, `telefone`, `email`, `endereco_idendereco`, `veiculo_idveiculo`) VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ssssssii',$nome,$cpf,$nascimento,$rg,$telefone,$email,$endereco_id_endereco,$veiculo_id_veiculo);
			$nome = $cliente->getNome();
			$cpf = $cliente->getCpf();
			$nascimento = $cliente->getNascimento();
			$rg = $cliente->getRg();
			$telefone = $cliente->getTelefone();
			$email = $cliente->getEmail();
			$endereco_id_endereco = $cliente->getEndereco_Id_Endereco();
			$veiculo_id_veiculo = $cliente->getVeiculo_Id_Veiculo();
			$stmt->execute();
			}catch(Exception $e){
				$retorno = false;
				die($e->getMessege());
			} finally{
				$stmt->close();
			$con->close();
			}

			
			return $retorno;
		}
	
		public function getAll(){
			$retorno = NULL;
			$conexao = new Conexao();
			$sql = "SELECT `c`.`idcliente`, `c`.`nome`, `c`.`cpf`, `c`.`nascimento`, `c`.`rg`, `c`.`telefone`, `c`.`email`, `e`.`logradouro` AS `endereco`, `v`.`modelo` AS `modelo` FROM `cliente` as `c` INNER JOIN `endereco` AS `e` ON `e`.`idendereco` = `c`.`endereco_idendereco` INNER JOIN `veiculo` AS `v` ON `v`.`idveiculo` = `c`.`veiculo_idveiculo` ORDER BY `c`.`nome` ASC";
			$con = $conexao->connection();
			$result = $con->query($sql);
			if($result->num_rows > 0){
				$retorno = array();
				while($row = $result->fetch_assoc()){
					$cliente = new Cliente();
					$cliente->setId_Cliente($row['idcliente']);
					$cliente->setNome($row['nome']);
					$cliente->setCpf($row['cpf']);
					$cliente->setRg($row['rg']);
					$cliente->setTelefone($row['telefone']);
					$cliente->setEmail($row['email']);
					$cliente->setEndereco_Id_Endereco($row['endereco']);
					$cliente->setVeiculo_Id_Veiculo($row['modelo']);
					array_push($retorno,$cliente);
				}
			}
			$con->close();
			return $retorno;
		}
	}
?>