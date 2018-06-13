<?php 
    require_once "../dao/daousuario.class.php";
    require_once "../class/usuario.class.php";
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
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Tipo de Usuario</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoUsuario();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                        echo "<td>{$value->getId_Usuario()}</td>";
                          echo "<td>{$value->getNome()}</td>";
                          echo "<td>{$value->getSobrenome()}</td>";
                          echo "<td>{$value->getEmail()}</td>";
                          echo "<td>{$value->getSenha()}</td>";
                          //echo "<td>{$value->getAdministrador()}</td>";
                          if($value->getAdministrador() == 1 ){
                            echo "<td>Administrador</td>";
                          }else{
                            echo "<td>Vendedor</td>";
                          }
                          echo "<td><a href='usuarioalterar.php?id_usuario={$value->getId_Usuario()}'><i class='material-icons'>update</i> </a> </td>";
                          echo "<td><a href='usuariodeletar.php?id_usuario={$value->getId_Usuario()}'><i class='material-icons'>delete</i> </a> </td>";
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