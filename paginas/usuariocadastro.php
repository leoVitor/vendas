<?php 
    session_start();
    require_once "../dao/daousuario.class.php";
    require_once "../class/usuario.class.php";
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
              
              <li><a href="usuarioconsulta.php"><i class="material-icons">face</i>Usuarios</a></li>
              
              <li><a href="estadoconsulta.php"><i class="material-icons">public</i>Estado</a></li>
              
              <li><a href="cidadeconsulta.php"><i class="material-icons">location_city</i>Cidade</a></li>
              
              <li><a href="veiculoconsulta.php"><i class="material-icons">directions_car</i>Veiculo</a></li>
              
              <li><a href="admclienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li><a href="admvendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
              
              <li><a href="enderecocadastro.php"><i class="material-icons">location_on</i>Endereço</a></li>
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
                    <input type="text" name="nome" id="nome" class="validate required">
                    <label for="nome">Nome</label>
                  </div>
                  <div class="col s12 input-field">
                    <input type="text" name="sobrenome" id="sobrenome" class="validate required">
                    <label for="sobrenome">Sobrenome</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 input-field">
                    <input type="email" name="email" id="email" class="validate required">
                    <label for="email">Email</label>
                  </div>
                  <div class="col s12 input-field">
                    <input type="password" name="senha" id="senha" class="validate required" minlength="5">
                    <label for="senha">Senha</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="submit"></i>Cadastrar</button>
                  </div>
                </div>
                <?php
                  if(isset($_POST['submit'])){
                    $usuario = new Usuario();
                    $usuario->setNome($_POST['nome']);
                    $usuario->setSobrenome($_POST['sobrenome']);
                    $usuario->setEmail($_POST['email']);
                    $usuario->setSenha($_POST['senha']);
                    $usuario->setAdministrador(0); //1 administrador, 0 usuario normal;

                    $dao = new DaoUsuario();
                    if($dao->save($usuario)){
                      echo "<script> alert('Cadastro efetuado'); window.location.href='usuarioconsulta.php'</script>";
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
        })
      </script>
    </body>
  </html>