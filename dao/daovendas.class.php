<?php
    require_once "../class/vendas.class.php";
    require_once "../con/conexao.class.php";
    class DaoVendas{
        public function save($vendas){
			$conexao = New Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `vendas`(`cliente_idcliente`, `data`, `valor`) VALUES (?,?,?)";
			$stmt = $con->prepare($sql);
            $stmt->bind_param('iss',$cliente_id_cliente,$data,$valor);
            
			$cliente_id_cliente = $vendas->getCliente_Id_Cliente();
			$data = $vendas->getData();
            $valor = $vendas->getValor();
            
            $stmt->execute();
            
            $id_retornado = $con->insert_id; 

            $stmt->close();
            $con->close();    

            return $id_retornado;
            
		}
		public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `v`.`idvendas`, `c`.`nome` AS `cliente`, `v`.`data`, `v`.`valor` FROM `vendas` AS `v` 
			INNER JOIN `cliente` AS `c` ON `c`.idcliente = `v`.`cliente_idcliente` ORDER BY `v`.data ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $vendas = new Vendas();
                    $vendas->setId_Vendas($row['idvendas']);
                    $vendas->setCliente_Id_Cliente($row['cliente']);
					$vendas->setData($row['data']);
					$vendas->setValor($row['valor']);
                    array_push($retorno,$vendas);
                }
            }
            $con->close();

            return $retorno;
		}
		public function buscar($id){
            $conexao = new Conexao(); 
            $vendas  = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `v`.`idvendas`, `c`.`nome` AS `cliente`, `v`.`data`, `v`.`valor` 
            FROM `vendas` AS `v` INNER JOIN `cliente` AS `c` ON `c`.idcliente = `v`.`cliente_idcliente` WHERE `v`.`idvendas` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $vendas = new Vendas();
					$id = $row['idvendas'];
                    $cliente_id_cliente = $row['cliente'];
					$data = $row['data'];
					$valor = $row['valor'];
    
                    $vendas->setCliente_Id_Cliente($cliente_id_cliente);
					$vendas->setData($data);
					$vendas->setValor($valor);
                    $vendas->setId_Vendas($id);
    
                }
			}
			
            $con->close();
            return $vendas;
        }
        
        public function getOne($id){
            $conexao = new Conexao(); 
            $vendas  = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `v`.`idvendas`,`v`.`cliente_idcliente` AS `id_cliente` , `c`.`nome` AS `cliente`, `v`.`data`, `v`.`valor` 
            FROM `vendas` AS `v` INNER JOIN `cliente` AS `c` ON `c`.idcliente = `v`.`cliente_idcliente` WHERE `v`.`idvendas` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $vendas = new Vendas();
					$id = $row['idvendas'];
                    $id_cliente = $row['id_cliente'];
                    $nome_cliente = $row['cliente'];
					$data = $row['data'];
					$valor = $row['valor'];
    
                    $vendas->setCliente_Id_Cliente($id_cliente);
                    $vendas->setNomeCliente($nome_cliente);
					$vendas->setData($data);
					$vendas->setValor($valor);
                    $vendas->setId_Vendas($id);
    
                }
			}
			
            $con->close();
            return $vendas;
        }

		public function update($vendas){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
			$sql = "UPDATE `vendas` SET `cliente_idcliente`='".$vendas->getCliente_Id_Cliente()."',`data`='".$vendas->getData()."',`valor`='".$vendas->getValor()."' WHERE `idvendas`= ".$vendas->getId_Vendas();
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
            $sql ="DELETE FROM `vendas` WHERE `idvendas`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
        }
    }
?>