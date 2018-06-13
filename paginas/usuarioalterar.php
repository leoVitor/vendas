<?php
  require_once "../class/usuario.class.php";
  require_once "../dao/daousuario.class.php";
  $usuario = NULL;
  if(isset($_GET['id_usuario'])){
      $id = $_GET['id_usuario'];
      $dao = new DaoUsuario();
      $usuario = $dao->consulta($id);
  }
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
      <title>Alterar Dados</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s12 input-field">
                <input type="text" name="nome" id="nome" value="<?php echo $usuario->getNome();?>">
                <label for="nome">Nome</label>
              </div>
              <div class="col s12 input-field">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $usuario->getSobrenome();?>">
                <label for="sobrenome">Sobrenome</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <input type="email" name="email" id="email" value="<?php echo $usuario->getEmail();?>">
                <label for="email">Email</label>
              </div>
              <div class="col s12 input-field">
                <input type="password" name="senha" id="senha" value="<?php echo $usuario->getSenha();?>">
                <label for="senha">Senha</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select>
                  <option value="0" selected>Vendedor</option>
                  <option value="1">Administrador</option>
                </select>
                <label>Nível de acesso</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Alterar</button>
              </div>
            </div>
            <?php
              if(isset($_POST['submit'])){
                $usuario->setNome($_POST['nome']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);
                $usuario->setAdministrador(0); //1 administrador, 0 usuario normal;

                $dao = new DaoUsuario();
                if($dao->update($usuario)){
                    echo "<script> alert('Dados Alterados'); window.location.href='usuarioconsulta.php'; </script>";
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
        