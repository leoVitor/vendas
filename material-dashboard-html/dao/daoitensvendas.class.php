<?php
	require_once "../class/itensvendas.class.php";
	require_once "../con/conexao.class.php";
	class DaoItensVendas{
		public function save($itensvendas){
			$conexao = New Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `itensVendas`(`vendas_idvendas`, `produto_idproduto`, `quantidade`, `valor`) VALUES (?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('iiss',$vendas_id_vendas,$produto_id_produto,$quantidade,$valor);
			$vendas_id_vendas = $itensvendas->getVendas_Id_Vendas();
            $produto_id_produto = $itensvendas->getProduto_Id_Produto();
            $quantidade = $itensvendas->getQuantidade();
            $valor = $itensvendas->getValor();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
		public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `i`.`iditensVendas`, `v`.`idvendas` AS `venda`, `p`.`nome` AS `produto`, `i`.`quantidade`, `i`.`valor` 
            FROM `itensVendas` AS `i` INNER JOIN `vendas` AS `v` ON `v`.`idvendas` = `i`.`vendas_idvendas` 
            INNER JOIN `produto` AS `p` ON `p`.`idproduto` = `i`.`produto_idproduto` ORDER BY `i`.`valor` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $itensvendas = new ItensVendas();
                    $itensvendas->setId_Itensvendas($row['iditensVendas']);
                    $itensvendas->setVendas_Id_Vendas($row['venda']);
                    $itensvendas->setProduto_Id_Produto($row['produto']);
                    $itensvendas->setQuantidade($row['quantidade']);
                    $itensvendas->setValor($row['valor']);
                    array_push($retorno,$itensvendas);
                }
            }
            $con->close();
            return $retorno;
		}
		public function buscar($id){
            $conexao = new Conexao(); 
            $itensvendas  = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `iditensVendas`, `vendas_idvendas`, `produto_idproduto`, `quantidade`, `valor` FROM `itensVendas` WHERE `iditensVendas` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $itensvendas = new ItensVendas();
					$id = $row['iditensVendas'];
					$vendas_id_vendas = $row['vendas_idvendas'];
					$produto_id_produto = $row['produto_idproduto'];
					$quantidade = $row['quantidade'];
					$valor = $row['valor'];
    
                    $itensvendas->setVendas_Id_Vendas($vendas_id_vendas);
                    $itensvendas->setProduto_Id_Produto($produto_id_produto);
                    $itensvendas->setQuantidade($quantidade);
                    $itensvendas->setValor($valor);
                    $itensvendas->setId_Itensvendas($id);
    
                }
			}
			
            $con->close();
            return $itensvendas;
		}
		public function update($itensvendas){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
            $sql = "UPDATE `itensVendas` SET `vendas_idvendas`='".$itensvendas->getVendas_Id_Vendas()."',
            `produto_idproduto`='".$itensvendas->getProduto_Id_Produto()."',`quantidade`='".$itensvendas->getQuantidade()."',
            `valor`='".$itensvendas->getValor()."' WHERE `iditensvendas`= ".$itensvendas->getId_Itensvendas();
            if($con->query($sql)==TRUE){
                $resultado = TRUE;
            }else{
                echo "ERRO ".$con->error;
            }
            $con->close();
            return $resultado;
        }
        public function delete($id){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con = $conexao->connection();
            $sql ="DELETE FROM `itensVendas` WHERE `iditensVendas`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
        }
	}
?>