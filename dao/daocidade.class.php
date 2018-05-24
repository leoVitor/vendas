<?php
	require_once "../class/cidade.class.php";
	require_once "../con/conexao.class.php";
	class DaoCidade{
		public function save($cidade){
			$conexao = New Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `cidade`(`nome`, `sigla`, `estado_idestado`) VALUES (?,?,?)";
			$stmt = $con->prepare($sql);
            $stmt->bind_param('ssi',$nome,$sigla,$estado_idestado);
            
			$nome = $cidade->getNome();
            $sigla = $cidade->getSigla();
			$estado_idestado = $cidade->getEstado_id_estado();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
        }
        public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao();
            $sql = "SELECT `c`.`idcidade`, `c`.`nome`,`c`.`sigla`, `e`.`nome` AS `estado` 
                    FROM `cidade` AS `c`INNER JOIN `estado` AS `e` 
                    ON `e`.`idestado` = `c`.`estado_idestado` ORDER BY `c`.`nome` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $cidade = new Cidade();
                    $cidade->setId_cidade($row['idcidade']);
                    $cidade->setNome($row['nome']);
                    $cidade->setSigla($row['sigla']);
                    $cidade->setEstado_id_estado($row['estado']);
                    array_push($retorno,$cidade);
                }
            }
            $con->close();
            return $retorno;
        }
        public function buscar($id){
            $conexao = new Conexao();
            $estado = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `idcidade`, `nome`, `sigla`, `estado_idestado` FROM `cidade` WHERE `idcidade`= {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $cidade = new Cidade();
                    $id = $row['idcidade'];
                    $nome = $row['nome'];
                    $sigla = $row['sigla'];
                    $estado_id_estado = $row['estado_idestado'];

                    $cidade->setId_Cidade($id);
                    $cidade->setNome($nome);
                    $cidade->setSigla($sigla);
                    $cidade->setEstado_id_estado($estado_id_estado);
                }
            }
        }
        public static function update($cidade){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
            $sql = "UPDATE `cidade` SET `nome`='".$cidade->getNome()."',`sigla`='".$cidade->getSigla()."',`estado_idestado`='".$cidade->getEstado_id_estado()."'
            WHERE `idcidade`=".$cidade->getId_Cidade();
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