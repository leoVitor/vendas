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
    </head>

    <body>
    
      <div class="wrapper ">
        
        <!-- sidebar -->
        <div class="main-panel">
          <!-- navbar -->
          <nav class="grey darken-3 " >
            <div class="nav-wrapper">
              <a class="brand-logo center">Seu Comércio</a>
              
            </div>
          </nav>
          <!-- navbar -->
         
          <!-- Page -->
          <div class="row"></div>
          <div class="row"></div>
          <div class="row"></div>
          <div class="row"></div>
          <div class="row">
            <div class="col s6 offset-s3">
              <form method="POST" class="card-panel">

                <div class="row">
                  <div class="col s8 offset-s2 input-field">
                    <input type="email" class="validate required"  name="email" id="email">
                    <label for="email">E-mail</label>
                  </div>
                </div>


                <div>
                  <div class="col s8 offset-s2 input-field">
                    <input type="password" name="senha" id="senha" minlength="5" class="validate required">
                    <label for="senha">Senha</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-1" type="submit" name="submit"></i>Logar</button>
                  </div>
                </div>
                <?php
                  if (isset($_POST['submit'])) {
                      //echo $_POST['email'];
                    $usuario = new DaoUsuario();
                    $resultado = $usuario->login($_POST['email']);
                    //echo "</br>".$resultado->getEmail() ."</br>".$resultado->getSenha() ;

                    if($resultado->getEmail() == $_POST['email'] && $resultado->getSenha() == $_POST['senha']){
                        if($resultado->getAdministrador() == 1){
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['nome'] = $resultado->getNome() . " " . $resultado->getSobrenome();
                            echo "<script> window.location.href='admprodutoconsulta.php'</script>";
                        }
                        else{
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['nome'] = $resultado->getNome() . " " . $resultado->getSobrenome();
                            echo "<script> window.location.href='vendascadastro.php'</script>";
                        }
                    }
                    else{
                        echo"<script>alert('E-mail ou Senha Incorretos')</script>";
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
      
    </body>
  </html>