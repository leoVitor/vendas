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
					$cliente->setNascimento($row['nascimento']);
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
		public function buscar($id){
            $conexao = new Conexao(); 
            $cliente  = NULL;
            $con = $conexao->connection();
			$sql = "SELECT `idcliente`, `nome`, `cpf`, `nascimento`, `rg`, `telefone`, `email`, 
						   `endereco_idendereco`, `veiculo_idveiculo` FROM `cliente` WHERE `idcliente` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $cliente = new Cliente();
					$id = $row['idcliente'];
					$nome = $row['nome'];
					$cpf = $row['cpf'];
					$nascimento = $row['nascimento'];
					$rg = $row['rg'];
					$telefone = $row['telefone'];
					$email = $row['email'];
					$endereco_id_endereco = $row['endereco_idendereco'];
					$veiculo_id_veiculo = $row['veiculo_idveiculo'];
    
                    $cliente->setNome($nome);
					$cliente->setCpf($cpf);
					$cliente->setNascimento($nascimento);
					$cliente->setRg($rg);
					$cliente->setTelefone($telefone);
					$cliente->setEmail($email);
					$cliente->setEndereco_Id_Endereco($endereco_id_endereco);
					$cliente->setVeiculo_Id_Veiculo($veiculo_id_veiculo);
                    $cliente->setId_Cliente($id);
    
                }
			}
			
            $con->close();
            return $cliente;
		}
		public function delete($id){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con = $conexao->connection();
            $sql ="DELETE FROM `cliente` WHERE `idcliente`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
		}
		public function update($cliente){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
			$sql = "UPDATE `cliente` SET `nome`='".$cliente->getNome()."',`cpf`='".$cliente->getCpf()."',`nascimento`=,
			`rg`='".$cliente->getRg()."',`telefone`='".$cliente->getTelefone()."',`email`='".$cliente->getEmail()."',
			`endereco_idendereco`='".$cliente->getEndereco_Id_Endereco()."',`veiculo_idveiculo`='".$cliente->getVeiculo_Id_Veiculo()."'
			 WHERE `idcliente`=".$cliente->getId_Cliente();
            if($con->query($sql)==TRUE){
                $resultado = TRUE;
            }else{
                echo "ERRO ".$con->error;
            }
            $con->close();
            return $resultado;
        }
	}
?>