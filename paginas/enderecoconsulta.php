<?php
    require_once "../dao/daoendereco.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daocidade.class.php";
    require_once "../class/cidade.class.php";
    session_start();
  
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

              <li><a href="admprodutoconsulta.php"><i class="material-icons">shopping_basket</i>Produto</a></li>
              
              <li><a href="usuarioconsulta.php"><i class="material-icons">face</i>Usuarios</a></li>
              
              <li><a href="estadoconsulta.php"><i class="material-icons">public</i>Estado</a></li>
              
              <li><a href="cidadeconsulta.php"><i class="material-icons">location_city</i>Cidade</a></li>
              
              <li><a href="veiculoconsulta.php"><i class="material-icons">directions_car</i>Veiculo</a></li>
              
              <li><a href="admclienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li><a href="admvendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
              
              <li class="active grey darken-1"><a href="enderecocadastro.php"><i class="material-icons">location_on</i>Endereço</a></li>
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
              <table class="striped highlight">
                <thead>
                  <tr>
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Cidade</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoEndereco();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                            echo "<td>{$value->getLogradouro()}</td>";
                            echo "<td>{$value->getCep()}</td>";
                            echo "<td>{$value->getNumero()}</td>";
                            echo "<td>{$value->getComplemento()}</td>";
                            echo "<td>{$value->getCidade_Id_Cidade()}</td>";
                            echo "<td><a href='enderecoalterar.php?id_endereco={$value->getId_Endereco()}'><i class='material-icons'>update</i> </a> </td>";
                            echo "<td><a href='enderecodeletar.php?id_endereco={$value->getId_Endereco()}'><i class='material-icons'>delete</i> </a> </td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div>
          </div>
          <div class="fixed-action-btn">
            <a href="enderecocadastro.php" class="btn-floating pulse btn-large waves-effect waves-light grey darken-3"><i class="material-icons">add</i></a>
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