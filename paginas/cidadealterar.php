<?php
 session_start();
  require_once "../dao/daocidade.class.php";
  require_once "../class/cidade.class.php";
  require_once "../dao/daoestado.class.php";
  require_once "../class/estado.class.php";
  
  if(!isset($_SESSION['email'])){
    echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
  }

  $cidade = NULL;
   if(isset($_GET["id_cidade"])){
       $id = $_GET["id_cidade"];
       $dao = new DaoCidade();
       $cidade = $dao->buscar($id);
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
              
              <li class="active grey darken-1"><a href="cidadeconsulta.php"><i class="material-icons">location_city</i>Cidade</a></li>
              
              <li><a href="veiculoconsulta.php"><i class="material-icons">directions_car</i>Veiculo</a></li>
              
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
                    <input type="text" name="nome" id="nome" value="<?php echo $cidade->getNome();?>">
                    <label for="nome">Nome da Cidade</label>
                  </div>
                  <div class="col s6 input-field">
                    <input type="text" name="sigla" id="sigla" value="<?php echo $cidade->getSigla();?>">
                    <label for="sigla">Sigla</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <?php
                    $idEstado = $cidade->getEstado_id_estado();

                    $daoEstado = new DaoEstado();
                    $estado = $daoEstado->pesquisarEstado($idEstado);
                    echo "<select name='estado' id='estado' required>";
                    echo "<option value='' disabled>Selecione o Estado</option>";
                    echo "<option value='".$estado->getId_estado()."'  selected>".$estado->getNome()."</option>";
                    $daoestado = new DaoEstado();
                    $estados = $daoestado->getAll();
                    
                    if($estados != null)
                      foreach ($estados as $key => $estado) {
                        echo "<option value='{$estado->getId_estado()}'>{$estado->getNome()}</option>";
                      }
                    
                    else echo "null";
                    echo "</select>";
                    echo "<label>Estados</label>"
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
                    $cidade->setNome($_POST['nome']);
                    $cidade->setSigla($_POST['sigla']);
                    $cidade->setEstado_id_estado($_POST['estado']);
                    $dao = new DaoCidade();
                    if($dao->update($cidade)){
                        echo "<script>alert('Alterado com sucesso'); window.location.href='cidadeconsulta.php';</script>";
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