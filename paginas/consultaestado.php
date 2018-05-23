
<?php 
    require_once "../dao/daoestado.class.php";
    require_once "../class/estado.class.php";
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
              <th>Nome</th>
              <th>UF</th>
              <th>Alterar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody>
        <?php
            $dao = new DaoEstado();
            $resultado = $dao->getAll();
            if($resultado != NULL){
                foreach ($resultado as $key => $value) {
                    echo "<tr>";
                    echo "<td>{$value->getId_estado()}</td>";
                    echo "<td>{$value->getNome()}</td>";
                    echo "<td>{$value->getUf()}</td>";
                    echo "<td><a href='alterarestado.php?id_estado={$value->getId_estado()}'><i class='material-icons'>update</i> </a> </td>";
                    //echo "<td><a href='excluirAluno.php?codigo={$value->getCodigo()}'><i class='material-icons'>delete</i> </a> </td>";
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