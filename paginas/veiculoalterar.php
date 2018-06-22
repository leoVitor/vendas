<?php
    session_start();
    require_once "../class/veiculo.class.php";
    require_once "../dao/daoveiculo.class.php";
  
    if(!isset($_SESSION['email'])){
      echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
    }
  
    $veiculo = NULL;
    if(isset($_GET["id_veiculo"])){
        $id = $_GET["id_veiculo"];
        $dao = new DaoVeiculo();
        $veiculo = $dao->busca($id);
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
      <title>Consulta de Dados</title>
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

              <li><a href="admprodutoconsulta.php"><i class="material-icons">home</i>Início</a></li>
              
              <li><a href="usuarioconsulta.php"><i class="material-icons">face</i>Usuarios</a></li>
              
              <li><a href="estadoconsulta.php"><i class="material-icons">public</i>Estado</a></li>
              
              <li><a href="cidadeconsulta.php"><i class="material-icons">location_city</i>Cidade</a></li>
              
              <li class="active grey darken-1"><a href="veiculoconsulta.php"><i class="material-icons">directions_car</i>Veiculo</a></li>
              
              <li><a href="admclienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li><a href="admvendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
              
              <li><a href="enderecocadastro.php"><i class="material-icons">location_on</i>Endereço</a></li>
              <li><a href="index.php"><i class="material-icons">exit_to_app</i>Deslogar</a></li>
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
                  <div class="col s6 input-field">
                    <input type="text" name="modelo" id="modelo" value="<?php echo $veiculo->getModelo();?>">
                    <label for="modelo">Modelo</label>
                  </div>
                  <div class="col s6 input-field">
                    <input type="number" name="ano" id="ano" value="<?php echo $veiculo->getAno();?>">
                    <label for="number">Ano do Veiculo</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s6 input-field">
                    <input type="text" name="placa" id="placa" value="<?php echo $veiculo->getPlaca();?>">
                    <label for="placa">Placa do Veiculo</label>
                  </div>
                  <div class="col s6 input-field">
                    <input type="text" name="chassi" id="chassi" value="<?php echo $veiculo->getChassi();?>">
                    <label for="chassi">Número do Chassi</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 input-field">
                    <input type="text" name="preco" id="preco" value="<?php echo $veiculo->getPreco();?>">
                    <label for="preco">Valor do Veiculo</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="submit"></i>Alterar</button>
                  </div>
                </div>
                <?php
                  if (isset($_POST['submit'])) {
                    $veiculo->setModelo($_POST['modelo']);
                    $veiculo->setAno($_POST['ano']);
                    $veiculo->setPlaca($_POST['placa']);
                    $veiculo->setChassi($_POST['chassi']);
                    $veiculo->setPreco($_POST['preco']);


                    $dao = new DaoVeiculo();
                    if ($dao->update($veiculo)) {
                      echo "<script> alert('Dados Alterados'); window.location.href='veiculoconsulta.php'; </script>";
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