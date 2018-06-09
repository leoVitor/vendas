<?php 
    require_once "../dao/daocliente.class.php";
    require_once "../class/cliente.class.php";
    require_once "../dao/daoendereco.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daoveiculo.class.php";
    require_once "../class/veiculo.class.php";
?>
<!DOCTYPE html>
    <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <meta charset="utf-8">
          <title>Consulta de Dados</title>
          </head>
        
          <div class="row">
            <div class="col s12">
              <table>
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Nascimento</th>
                    <th>RG</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Veículo</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoCliente();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                        echo "<tr>";
                        
                            $nascimento = date('d-m-Y', strtotime($value->getNascimento() ));
                            echo "<td>{$value->getNome()}</td>";
                            echo "<td>{$value->getCpf()}</td>";
                            echo "<td>".$nascimento."</td>";
                            echo "<td>{$value->getRg()}</td>";
                            echo "<td>{$value->getTelefone()}</td>";
                            echo "<td>{$value->getEmail()}</td>";
                            echo "<td>{$value->getEndereco_Id_Endereco()}</td>";
                            echo "<td>{$value->getVeiculo_Id_Veiculo()}</td>";
                            echo "<td><a href='clientealterar.php?id_cliente={$value->getId_Cliente()}'><i class='material-icons'>update</i> </a> </td>";
                            echo "<td><a href='clientedeletar.php?id_cliente={$value->getId_Cliente()}'><i class='material-icons'>delete</i> </a> </td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div>
          </div>
        <body>
          <!--Import jQuery before materialize.js-->
          <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <script type="text/javascript" src="js/materialize.min.js"></script>
      </body>
    </html>