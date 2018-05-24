<?php 
    require_once "../dao/daoestado.class.php";
    require_once "../class/estado.class.php";
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
          <title>Consulta de Cidade</title>
          </head>
        
          <div class="row">
            <div class="col s12">
              <table>
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Estado</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoCidade();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                            echo "<td>{$value->getNome()}</td>";
                            echo "<td>{$value->getSigla()}</td>";
                            echo "<td>{$value->getEstado_id_estado()}</td>";
                            echo "<td><a href='cidadealterar.php?id_cidade={$value->getId_cidade()}'><i class='material-icons'>update</i> </a> </td>";
                            echo "<td><a href='produtodeletar.php?id_cidade={$value->getId_cidade()}'><i class='material-icons'>delete</i> </a> </td>";
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