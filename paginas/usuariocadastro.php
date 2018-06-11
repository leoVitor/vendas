<?php
  require_once "../class/usuario.class.php";
  require_once "../dao/daousuario.class.php";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <title>Cadastro de Usuario</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s12 input-field">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
              </div>
              <div class="col s12 input-field">
                <input type="text" name="sobrenome" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <input type="email" name="email" id="email">
                <label for="email">Email</label>
              </div>
              <div class="col s12 input-field">
                <input type="password" name="senha" id="senha">
                <label for="senha">Senha</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
              <select name="administrador" id="administrador">
                <option value="" disabled selected>Tipo de Usuario</option>
                <option value="0">Administrador</option>
                <option value="1">Vendedor</option>
              </select>
              <label>Tipo de Usuario</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
              if(isset($_POST['submit'])){
                $usuario = new Usuario();
                $usuario->setNome($_POST['nome']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);
                $usuario->setAdministrador($_POST['administrador']);

                $dao = new DaoUsuario();
                if($dao->save($usuario)){
                  echo "<script> alert('Cadastro efetuado')  </script>";
                }
              }
            ?>
          </form>
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
      </script>
    </body>
  </html>
        