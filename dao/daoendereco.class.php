<?php
    require_once "../con/conexao.class.php";
    require_once "../class/endereco.class.php";
    class DaoEndereco{
        public static function save($endereco){
            $conexao = New Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `endereco`(`logradouro`, `cep`, `numero`, `complemento`, `cidade_idcidade`) VALUES (?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ssssi',$logradouro,$cep,$numero,$complemento,$cidade_id_cidade);
			$logradouro = $endereco->getLogradouro();
            $cep = $endereco->getCep();
            $numero = $endereco->getNumero();
            $complemento = $endereco->getComplemento();
            $cidade_id_cidade = $endereco->getCidade_Id_Cidade();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
        } 
    }
?>