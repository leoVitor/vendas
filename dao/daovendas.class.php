<?php
    require_once "../class/vendas.class.php";
    require_once "../con/conexao.class.php";
    class DaoVendas{
        public static function save($vendas){
			$conexao = New Conexao();
			$sql = "INSERT INTO `vendas`(`cliente_idcliente`, `data`, `valor`) VALUES (?,?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('iss',$cliente_id_cliente,$data,$valor);
			$cliente_id_cliente = $vendas->getCliente_Id_Cliente();
			$data = $vendas->getData();
			$valor = $vendas->getValor();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
    }
?>