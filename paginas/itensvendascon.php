<?php
  require_once "../class/itensvendas.class.php";
  require_once "../dao/daoitensvendas.class.php";
  require_once "../class/vendas.class.php";
  require_once "../dao/daovendas.class.php";
  require_once "../class/produto.class.php";
  require_once "../dao/daoproduto.class.php";
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
              <div class="col s12">
                <table>
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Venda</th>
                      <th>Produto</th>
                      <th>Quantidade</th>
                      <th>Valor</th>
                      <th>Alterar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>

                <tbody>
                <?php
                    $dao = new DaoItensVendas();
                    $resultado = $dao->getAll();
                    if($resultado != NULL){
                        foreach ($resultado as $key => $value) {
                            echo "<tr>";
                            echo "<td>{$value->getId_Itensvendas()}</td>";
                            echo "<td>{$value->getVendas_Id_Vendas()}</td>";
                            echo "<td>{$value->getProduto_Id_Produto()}</td>";
                            echo "<td>{$value->getQuantidade()}</td>";
                            echo "<td>{$value->getValor()}</td>";
                           echo "<td><a href='itensvendasalt.php?id_itensvendas={$value->getId_Itensvendas()}'><i class='material-icons'>update</i> </a> </td>";
                           echo "<td><a href='itensvendasdel.php?id_itensvendas={$value->getId_Itensvendas()}'><i class='material-icons'>delete</i> </a> </td>";
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