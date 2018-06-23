<?php
  require_once "../dao/daocliente.class.php";
  require_once "../class/cliente.class.php";
  require_once "../dao/daoendereco.class.php";
  require_once "../class/endereco.class.php";
  require_once "../dao/daoveiculo.class.php";
  require_once "../class/veiculo.class.php";
  
  session_start();
  
  if(!isset($_SESSION['email'])){
    echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
  }

  $cliente = NULL;
  if(isset($_GET["id_cliente"])){
      $id = $_GET["id_cliente"];
      $dao = new DaoCliente();
      $cliente = $dao->buscar($id);
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
              
              <li class="active grey darken-1"><a href="admclienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
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
            <div class="col s6 offset-s3">
              <form method="POST" class="card-panel">
                <div class="row">

                  <div class="col s6 input-field">
                    <input type="text" name="nome" id="nome" value="<?php echo $cliente->getNome();?>">
                    <label for="nome">Nome</label>
                  </div>

                  <div class="col s6 input-field">
                    <input type="text" name="cpf" id="cpf" value="<?php echo $cliente->getCpf();?>">
                    <label for="cpf">CPF</label>
                  </div>
                </div>

                <div class="row">

                  <div class="col s6 input-field">
                    <input type="date" name="nascimento" id="nascimento" value="<?php echo $cliente->getNascimento();?>">
                    <!--<label for="nascimento">nascimento</label>-->
                  </div>

                  <div class="col s6 input-field">
                    <input type="text" name="rg" id="rg" value="<?php echo $cliente->getRg();?>">
                    <label for="rg">RG</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col s6 input-field">
                    <input type="text" name="telefone" id="telefone" value="<?php echo $cliente->getTelefone();?>">
                    <label for="telefone">Telefone</label>
                  </div>

                  <div class="col s6 input-field">
                    <input type="text" name="email" id="email" value="<?php echo $cliente->getEmail();?>">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <?php
                      $idendereco = $cliente->getEndereco_Id_Endereco();

                      $daoEndereco = new DaoEndereco();
                      $endereco = $daoEndereco->buscar($idendereco);
                      echo "<select name='endereco' id='endereco' required>";
                      echo "<option value='' disabled selected>Endereço</option>";
                      echo "<option value='".$endereco->getId_Endereco()."'  selected>".$endereco->getLogradouro()."</option>";
                      $daoendereco = new DaoEndereco();
                      $buscaendereco = $daoendereco->getAll();

                      if($buscaendereco != null)
                      foreach ($buscaendereco as $key => $endereco) {
                      echo "<option value='{$endereco->getId_Endereco()}'>{$endereco->getLogradouro()}</option>";
                      }

                      else echo "null";
                      echo "</select>";
                      echo "<label>Logradouro</label>"
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <?php
                      $idveiculo = $cliente->getVeiculo_Id_Veiculo();

                      $daoVeiculo = new DaoVeiculo();
                      $veiculo = $daoVeiculo->busca($idveiculo);
                      echo "<select name='veiculo' id='veiculo' required>";
                      echo "<option value='' disabled selected>Modelo do Veículo</option>";
                      echo "<option value='".$veiculo->getId_Veiculo()."'  selected>".$veiculo->getModelo()."</option>";
                      $daoveiculo = new DaoVeiculo();
                      $buscaveiculo = $daoveiculo->getAll();

                      if($buscaveiculo != null)
                      foreach ($buscaveiculo as $key => $veiculo) {
                      echo "<option value='{$veiculo->getId_Veiculo()}'>{$veiculo->getModelo()}</option>";
                      }

                      else echo "null";
                      echo "</select>";
                      echo "<label>Veiculo</label>"
                    ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="submit"></i>Alterar</button>
                  </div>
                </div>

                <?php
                  if(isset($_POST['submit'])){
                    $cliente->setNome($_POST['nome']);
                    $cliente->setCpf($_POST['cpf']);
                    $cliente->setNascimento($_POST['nascimento']);
                    $cliente->setRg($_POST['rg']);
                    $cliente->setTelefone($_POST['telefone']);
                    $cliente->setEmail($_POST['email']);
                    $cliente->setEndereco_Id_Endereco($_POST['endereco']);
                    $cliente->setVeiculo_Id_Veiculo($_POST['veiculo']);


                    $dao = new DaoCliente();
                    if($dao->update($cliente)){
                      echo "<script>alert('Alterado com sucesso'); window.location.href='clienteconsulta.php';</script>";
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