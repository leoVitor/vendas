<?php 
  session_start();
  require_once "../dao/daocliente.class.php";
  require_once "../class/cliente.class.php";
  require_once "../dao/daoendereco.class.php";
  require_once "../class/endereco.class.php";
  require_once "../dao/daoveiculo.class.php";
  require_once "../class/veiculo.class.php";
  
  if(!isset($_SESSION['email'])){
    echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
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
              <li><a class="waves-effect" href="produtoconsulta.php"><i class="material-icons">home</i>Produto</a></li>
             
              <li class=" grey darken-1 active"><a href="clienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li><a href="vendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
             
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
            <div class="col s8 offset-s3 card-panel">
              
            <div class="row" >
            <div class="col s12" >
            <table class="striped highlight">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Nascimento</th>
                    <th>RG</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Veículo</th>
                    <th>Alterar</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoCliente();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                        echo "<tr>";
                        
                            $nascimento = date('d-m-Y', strtotime($value->getNascimento() ));
                            echo "<td>{$value->getNome()}</td>";
                            echo "<td>{$value->getCpf()}</td>";
                            echo "<td>".$nascimento."</td>";
                            echo "<td>{$value->getRg()}</td>";
                            echo "<td>{$value->getTelefone()}</td>";
                            echo "<td>{$value->getEmail()}</td>";
                            echo "<td>{$value->getEndereco_Id_Endereco()}</td>";
                            echo "<td>{$value->getVeiculo_Id_Veiculo()}</td>";
                            echo "<td><a href='clientealterar.php?id_cliente={$value->getId_Cliente()}'><i class='material-icons'>update</i></td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div>
          </div>

            </div>
          </div>
          <!-- page -->
        </div>
      </div>]
      <div class="fixed-action-btn horizontal click-to-toggle">
        <a class="btn-floating btn-large grey darken-3">
          <i class="material-icons">menu</i>
        </a>
        <ul>
          <li><a class="btn-floating grey darken-1" href="Venderecocadastro.php"><i class="material-icons">location_on</i></a></li>
          <li><a class="btn-floating grey darken-2" href="Vclientecadastro.php"><i class="material-icons">people</i></a></li>
        </ul>
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

  <!-- <a class="btn hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a> -->