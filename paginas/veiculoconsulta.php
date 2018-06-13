<?php 
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
          <title>Consulta de Dados</title>
          </head>
        
          <div class="row">
            <div class="col s12">
              <table>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Placa</th>
                    <th>Chassi</th>
                    <th>Preco</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoVeiculo();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                          echo "<td>{$value->getId_Veiculo()}</td>";
                          echo "<td>{$value->getModelo()}</td>";
                          echo "<td>{$value->getAno()}</td>";
                          echo "<td>{$value->getPlaca()}</td>";
                          echo "<td>{$value->getChassi()}</td>";
                          echo "<td>{$value->getPreco()}</td>";
                          echo "<td><a href='veiculoalterar.php?id_veiculo={$value->getId_Veiculo()}'><i class='material-icons'>update</i> </a> </td>";
                          echo "<td><a href='veiculodeletar.php?id_veiculo={$value->getId_Veiculo()}'><i class='material-icons'>delete</i> </a> </td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div><?php 
    require_once "../dao/daoproduto.class.php";
    require_once "../class/produto.class.php";
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
          <title>Consulta de estado</title>
          </head>
        
          <div class="row">
            <div class="col s6 offset-s3">
              <table>
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoProduto();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                        echo "<td>{$value->getId_Produto()}</td>";
                          echo "<td>{$value->getNome()}</td>";
                          echo "<td>{$value->getValor()}</td>";
                          echo "<td><a href='produtoalterar.php?id_produto={$value->getId_Produto()}'><i class='material-icons'>update</i> </a> </td>";
                          echo "<td><a href='produtodeletar.php?id_produto={$value->getId_Produto()}'><i class='material-icons'>delete</i> </a> </td>";
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
          </div>
        <body>
          <!--Import jQuery before materialize.js-->
          <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <script type="text/javascript" src="js/materialize.min.js"></script>
      </body>
    </html>