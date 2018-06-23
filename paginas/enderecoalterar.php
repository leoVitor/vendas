<?php
  session_start();
    require_once "../class/cidade.class.php";
    require_once "../dao/daocidade.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daoendereco.class.php";
  
    if(!isset($_SESSION['email'])){
      echo "<script>alert('Por Favor Faça Login em nosso sistema');window.location.href='http://localhost/vendas/paginas/'</script>";
    }

    $endereco = NULL;
    if(isset($_GET['id_endereco'])){
        $id = $_GET['id_endereco'];
        $dao = new DaoEndereco();
        $endereco = $dao->buscar($id);

        $daoCidade = new DaoCidade();
        $cidade = $daoCidade->getOne($endereco->getCidade_Id_cidade());
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
      <title>Cadastro de Dados</title>
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
            <div class="col s8 offset-s3">
              <form method="POST" class="card-panel">
                <div class="row">
                  <div class="col s12 input-field">
                    <input type="text" name="logradouro" id="logradouro" value="<?php echo $endereco->getLogradouro();?>">
                    <label for="logradouro">Logradouro</label>
                  </div>
                  <div class="col s12 input-field">
                    <input type="text" name="cep" id="cep" value="<?php echo $endereco->getCep();?>">
                    <label for="cep">CEP</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 input-field">
                    <input type="text" name="numero" id="numero" value="<?php echo $endereco->getNumero();?>">
                    <label for="numero">Numero</label>
                  </div>
                  <div class="col s12 input-field">
                    <input type="text" name="complemento" id="complemento" value="<?php echo $endereco->getComplemento();?>">
                    <label for="complemento">Complemento</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <?php
                      echo "<select name='cidade' id='cidade' required>";
                      echo "<option value='' disabled >Selecione a Cidade</option>";
                      
                      if($cidade != NULL){
                          foreach($cidade as $key => $value){
                            echo "<option value='".$value->getId_cidade()."' selected>".$value->getNome()." - " .$value->getEstado_id_estado() ."</option>";
                          }
                      }

                      $daocidade = new DaoCidade();
                      $buscacidade = $daocidade->getAll();
                      
                      if($buscacidade != null)
                        foreach ($buscacidade as $key => $cidades) {
                          echo "<option value='{$cidades->getId_Cidade()}'>{$cidades->getNome()} - {$cidades->getEstado_id_estado()}</option>";
                        }
                      
                      else echo "null";
                      echo "</select>";
                      echo "<label>Cidade</label>"
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Alterar</button>
                  </div>
                </div>
                <?php
                    if(isset($_POST['submit'])){
                        $endereco->setLogradouro($_POST['logradouro']);
                        $endereco->setCep($_POST['cep']);
                        $endereco->setNumero($_POST['numero']);
                        $endereco->SetComplemento($_POST['complemento']);
                        $endereco->SetCidade_Id_Cidade($_POST['cidade']);

                        if($dao->update($endereco)){
                            echo "<script>alert('Alterado com sucesso'); window.location.href='enderecoconsulta.php';</script>";
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