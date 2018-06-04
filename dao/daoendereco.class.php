<?php
    require_once "../con/conexao.class.php";
    require_once "../class/endereco.class.php";
    class DaoEndereco{
        public static function save($endereco){
            $res = true;
            try{
            $conexao = new Conexao();
			$con = $conexao->connection();
			$sql = "INSERT INTO `endereco`(`logradouro`, `cep`, `numero`, `complemento`, `cidade_idcidade`) VALUES (?,?,?,?,?)";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ssssi',$logradouro,$cep,$numero,$complemento,$cidade_idcidade);
			$logradouro = $endereco->getLogradouro();
            $cep = $endereco->getCep();
            $numero = $endereco->getNumero();
            $complemento = $endereco->getComplemento();
            $cidade_idcidade = $endereco->getCidade_Id_Cidade();
    
           $stmt->execute();
           // var_dump($endereco);
            
            
            }catch(Exception $e){
                $res = false;
                echo $e->getMessage();
                
            }finally{
             //   var_dump($stmt);
              //  var_dump($endereco);
                $stmt->close();
                $con->close();
    
            }
			return $res;
        }
        public function getAll(){
            $conexao = new Conexao(); 
            $endereco = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `e`.`idendereco`, `e`.`logradouro`, `e`.`cep`, `e`.`numero`, `e`.`complemento`, `c`.`nome` 
            AS `cidade` FROM `endereco` AS `e` INNER JOIN `cidade` AS `c` ON `c` . `idcidade` = 
            `e`.`cidade_idcidade`ORDER BY `c`.`nome` ASC";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $endereco = new Endereco();
                    $endereco->setId_Endereco($row['idendereco']);
                    $endereco->setLogradouro($row['logradouro']);
                    $endereco->setCep($row['cep']);
                    $endereco->setNumero($row['numero']);
                    $endereco->setComplemento($row['complemento']);
                    $endereco->setCidade_Id_Cidade($row['cidade']);

                    array_push($retorno,$endereco);
                }
            }
            $con->close();
            return $retorno;
        }
        public function buscar($id){
            $conexao = new Conexao();
            $endereco = NULL;
            $con = $conexao->connection();
            $sql = "SELECT `idendereco`, `logradouro`, `cep`, `numero`, `complemento`, `cidade_idcidade` FROM `endereco` WHERE `idendereco`= {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $endereco = new Endereco();
                    $id = $row['idendereco'];
                    $logradouro = $row['logradouro'];
                    $cep = $row['cep'];
                    $numero = $row['numero'];
                    $complemento = $row['complemento'];
                    $cidade_id_cidade = $row['cidade_idcidade'];

                    $endereco->setId_Endereco($id);
                    $endereco->setLogradouro($logradouro);
                    $endereco->setCep($cep);
                    $endereco->setNumero($numero);
                    $endereco->setComplemento($complemento);
                    $cidade_id_cidade->setCidade_Id_Cidade($cidade_id_cidade);
                }
            }
        }
    }
?>