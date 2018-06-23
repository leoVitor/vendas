<?php
  session_start();
  require_once "../class/usuario.class.php";
  require_once "../dao/daousuario.class.php";
  
  if(!isset($_SESSION['email'])){
    echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
  }
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
      <div class="wrapper ">
        <!-- sidebar -->
        <div class="sidebar ">
          <div class="sidebar-wrapper ">
            <ul id="slide-out" class="side-nav fixed ">
              <li>
                <div class="user-view">
                  <div class="background">
                    <img src="img/banner2.png">
                  </div>
                  <a href=""><img class="circle" src="img/user.jpeg"></a>
                  <a href=""><span class="white-text name"> <?php echo $_SESSION['nome']; ?> </span></a>
                  <a href=""><span class="white-text email"> <?php echo $_SESSION['email']; ?> </span></a>
                </div>
              </li>

              <li><a href="admprodutoconsulta.php"><i class="material-icons">shopping_basket</i>Produto</a></li>
              
              <li class="active grey darken-1"><a href="usuarioconsulta.php"><i class="material-icons">face</i>Usuarios</a></li>
              
              <li><a href="estadoconsulta.php"><i class="material-icons">public</i>Estado</a></li>
              
              <li><a href="cidadeconsulta.php"><i class="material-icons">location_city</i>Cidade</a></li>
              
              <li><a href="veiculoconsulta.php"><i class="material-icons">directions_car</i>Veiculo</a></li>
              
              <li><a href="admclienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li><a href="admvendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
              
              <li><a href="enderecocadastro.php"><i class="material-icons">location_on</i>Endereço</a></li>
              <li><a href="sair.php"><i class="material-icons">exit_to_app</i>Deslogar</a></li>
            </ul>
          </div>
        </div>
        <!-- sidebar -->
        <div class="main-panel">
          <!-- navbar -->
          <nav class="grey darken-3 " >
            <div class="nav-wrapper">
              <a class="brand-logo center">Seu Comércio</a>
            </div>
          </nav>
          <!-- navbar -->
          <a class="bton hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a>
          <!-- Page -->
          <div class="row"></div>
          <div class="row"></div>
          <div class="row">
            <div class="col s8 offset-s3">
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
                    <select name="adm">
                      <option value="0" selected>Vendedor</option>
                      <option value="1">Administrador</option>
                    </select>
                    <label>Nível de acesso</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="submit"></i>Alterar</button>
                  </div>
                </div>
                <?php
                  if(isset($_POST['submit'])){
                    $usuario->setNome($_POST['nome']);
                    $usuario->setSobrenome($_POST['sobrenome']);
                    $usuario->setEmail($_POST['email']);
                    $usuario->setSenha($_POST['senha']);
                    $usuario->setAdministrador($_POST['adm']); //1 administrador, 0 usuario normal;

                    $dao = new DaoUsuario();
                    if($dao->update($usuario)){
                        echo "<script> alert('Dados Alterados'); window.location.href='usuarioconsulta.php'; </script>";
                    }
                  }
                ?>
              </form>
            </div>
          </div>

          <!-- page -->
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(".bton").sideNav({
            menuWidth: 250,
          });
          $('select').material_select();
        })
      </script>
    </body>
  </html>