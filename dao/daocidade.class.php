<?php
	require_once "../class/cidade.class.php";
	require_once "../con/conexao.class.php";
	class DaoCidade{
		public static function save($cidade){
			$conexao = New Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `cidade`(`nome`, `sigla`, `estado_idestado`) VALUES (?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss',$nome,$sigla,$estado_ide_stado);
			$nome = $cidade->getNome();
            $sigla = $cidade->getSigla();
			$estado_idestado = $cidade->getEstado_id_estado();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
		/*public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `idestado`, `nome`, `uf` FROM `estado` ORDER BY `nome` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $estado = new Estado();
                    $estado->setId_estado($row['idestado']);
                    $estado->setNome($row['nome']);
                    $estado->setUf($row['uf']);
                    array_push($retorno,$estado);
                }
            }
            $con->close();
            return $retorno;
		}
		public function pesquisarEstado($id){
            $conexao = new Conexao(); 
            $estado  = NULL;
            $con = $conexao->connection();
            $sql = " SELECT `idestado`, `nome`, `uf` FROM `estado` WHERE `idestado` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $estado = new Estado();
					$id = $row['idestado'];
					$nome = $row['nome'];
					$uf = $row['uf'];
    
                    $estado->setNome($nome);
                    $estado->setUf($uf);
                    $estado->setId_estado($id);
    
                }
			}
			
            $con->close();
            return $estado;
		}
		public static function update($estado){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
			$sql = "UPDATE `estado` SET `nome`='".$estado->getNome()."',`uf`='".$estado->getUf()."' WHERE `idestado`= ".$estado->getId_estado();
            if($con->query($sql)==TRUE){
                $resultado = TRUE;
            }else{
                echo "ERRO ".$con->error;
            }
            $con->close();
            return $resultado;
        }
        public static function delete($id){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con = $conexao->connection();
            $sql ="DELETE FROM `estado` WHERE `idestado`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
        }*/
	}
?>