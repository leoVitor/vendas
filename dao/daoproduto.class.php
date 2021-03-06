<?php
	require_once "../class/produto.class.php";
	require_once "../con/conexao.class.php";
	class DaoProduto{
		public function save($produto){
			$conexao = New Conexao();
			$sql = "INSERT INTO `produto`(`nome`, `valor`) VALUES (?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss',$nome,$valor);
			$nome = $produto->getNome();
			$valor = $produto->getValor();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
		public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `idproduto`, `nome`, `valor`  FROM `produto` ORDER BY `idproduto` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $produto = new Produto();
                    $produto->setId_produto($row['idproduto']);
                    $produto->setNome($row['nome']);
                    $produto->setValor($row['valor']);
                    array_push($retorno,$produto);
                }
            }
            $con->close();
            return $retorno;
        }
        public function getLimit(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `idproduto`, `nome`, `valor`  FROM `produto` LIMIT ";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $produto = new Produto();
                    $produto->setId_produto($row['idproduto']);
                    $produto->setNome($row['nome']);
                    $produto->setValor($row['valor']);
                    array_push($retorno,$produto);
                }
            }
            $con->close();
            return $retorno;
		}
		public function consulta($id){
            $conexao = new Conexao(); 
            $produto  = NULL;
            $con = $conexao->connection();
			$sql = "SELECT `idproduto`, `nome`, `valor` FROM `produto` WHERE `idproduto` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $produto = new Produto();
					$id = $row['idproduto'];
					$nome = $row['nome'];
					$valor = $row['valor'];
    
                    $produto->setNome($nome);
                    $produto->setValor($valor);
                    $produto->setId_produto($id);
    
                }
			}
			
            $con->close();
            return $produto;
		}
        public static function delete($id){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con = $conexao->connection();
            $sql ="DELETE FROM `produto` WHERE `idproduto`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
        }
        public static function alterar($produto){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
            $sql = "UPDATE `produto` SET `nome`='".$produto->getNome()."',`valor`='".$produto->getValor()."' WHERE `idproduto` = ".$produto->getId_Produto(); 
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