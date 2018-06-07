<?php 
    require_once "../dao/daoendereco.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daocidade.class.php";
    require_once "../class/cidade.class.php";
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
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Cidade</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoEndereco();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                            echo "<td>{$value->getLogradouro()}</td>";
                            echo "<td>{$value->getCep()}</td>";
                            echo "<td>{$value->getNumero()}</td>";
                            echo "<td>{$value->getComplemento()}</td>";
                            echo "<td>{$value->getCidade_Id_Cidade()}</td>";
                            echo "<td><a href='enderecoalterar.php?id_endereco={$value->getId_Endereco()}'><i class='material-icons'>update</i> </a> </td>";
                            echo "<td><a href='enderecodeletar.php?id_endereco={$value->getId_Endereco()}'><i class='material-icons'>delete</i> </a> </td>";
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