<?php
	require_once "../class/usuario.class.php";
	require_once "../con/conexao.class.php";
	class DaoUsuario{
		public static function save($usuario){
			$conexao = New Conexao();
			$sql = "INSERT INTO `usuario`(`nome`, `email`, `senha`, `sobrenome`, `administrador`) VALUES (?,?,?,?,?)";
			$con = $conexao->connection();
			$stmt = $con->prepare($sql);
			$stmt->bind_param('sssss',$nome,$email,$senha,$sobrenome,$administrador);
			$nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $sobrenome = $usuario->getSobrenome();
            $administrador =  $usuario->getAdministrador();
			$stmt->execute();

			$stmt->close();
			$con->close();

			return true;
		}
		public function getAll(){
            $retorno = NULL;
            $conexao = new Conexao(); 
            $sql = "SELECT `idusuario`, `nome`, `email`, `senha`, `sobrenome`, `administrador` FROM `usuario` ORDER BY `idusuario` ASC";
            $con = $conexao->connection();
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $retorno = array();
                while($row = $result->fetch_assoc()){
                    $usuario = new Usuario();
                    $usuario->setId_Usuario($row['idusuario']);
                    $usuario->setNome($row['nome']);
                    $usuario->setEmail($row['email']);
                    $usuario->setSenha($row['senha']);
                    $usuario->setSobrenome($row['sobrenome']);
                    $usuario->setAdministrador($row['administrador']);
                    array_push($retorno,$usuario);
                }
            }
            $con->close();
            return $retorno;
		}
		public function consulta($id){
            $conexao = new Conexao(); 
            $usuario  = NULL;
            $con = $conexao->connection();
			$sql = "SELECT `idusuario`, `nome`, `email`, `senha`, `sobrenome`, `administrador` FROM `usuario` WHERE `idusuario` = {$id}";
            $result = $con->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usuario = new Usuario();
					$id = $row['idusuario'];
					$nome = $row['nome'];
                    $email = $row['email'];
                    $senha = $row['senha'];
                    $sobrenome = $row['sobrenome'];
                    $administrador = $row['administrador'];
    
                    $usuario->setNome($nome);
                    $usuario->setEmail($email);
                    $usuario->setSenha($senha);
                    $usuario->setSobrenome($sobrenome);
                    $usuario->setAdministrador($administrador);
                    $usuario->setId_Usuario($id);
    
                }
			}
			
            $con->close();
            return $usuario;
		}
        public function update($usuario){
            $resultado = FALSE;
            $conexao = new Conexao();
            $con  = $conexao->connection();
            $sql = "UPDATE `usuario` SET `nome`='".$usuario->getNome()."',`email`='".$usuario->getEmail()."',`senha`='".$usuario->getSenha()."',
            `sobrenome`='".$usuario->getSobrenome()."',`administrador`='".$usuario->getAdministrador()."' WHERE `idusuario`= ".$usuario->getId_Usuario();
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
            $sql ="DELETE FROM `usuario` WHERE `idusuario`= ".$id;
            if($con->query($sql) == TRUE){
                $resultado = TRUE;
            }
            $con->close();
            return $resultado;
        }
	}
?>