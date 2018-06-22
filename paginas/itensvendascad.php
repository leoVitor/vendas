<?php
  require_once "../class/itensvendas.class.php";
  require_once "../dao/daoitensvendas.class.php";
  require_once "../class/vendas.class.php";
  require_once "../dao/daovendas.class.php";
  require_once "../class/produto.class.php";
  require_once "../dao/daoproduto.class.php";

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
              <li ><a class="waves-effect" href="produtoconsulta.php"><i class="material-icons">home</i>Produto</a></li>
              
              <li><a href="clienteconsulta.php"><i class="material-icons">people</i>Clientes</a></li>
              
              <li class=" grey darken-1 active"><a href="vendascadastro.php"><i class="material-icons">local_grocery_store</i>Venda</a></li>
              
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
                  <div class="col s7 offset-s1 input-field">
                    <?php
                      echo "<select name='produto' id='produto' required>";
                      echo "<option value='' disabled selected>Selecione o Produto</option>";
                      $daoproduto = new DaoProduto();
                      $produtos = $daoproduto->getAll();

                      if($produtos != null){
                        foreach ($produtos as $key => $produto) {
                        echo "<option value='{$produto->getId_Produto()}'>{$produto->getNome()}</option>";
                        }
                      }

                      else echo "null";
                      echo "</select>";
                      echo "<label>Produtos</label>"
                    ?>
                  </div>
                
                  <div class="col s3 input-field">
                    <input type="number" name="quantidade" id="quantidade" value="1">
                    <label for="quantidade">Quantidade</label>
                  </div>

                </div>

                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="adiciona"><i class="material-icons">add</i> Adicionar</button>
                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="finaliza"><i class="material-icons">save</i> Finalizar</button>
                  </div>
                </div>

                <?php
                  if (isset($_POST['adiciona'])) {
                    $itensVendas = new ItensVendas();
                    $itensVendas->setVendas_Id_Vendas($_SESSION['id_venda']);
                    $itensVendas->setProduto_Id_Produto($_POST['produto']);
                    $itensVendas->setQuantidade($_POST['quantidade']);
                      
                      $product = $daoproduto->consulta($_POST['produto']);   
                      $valor = $_POST['quantidade'] * $product->getValor();
                    $itensVendas->setValor($valor);

                    if(!isset($_SESSION['priceItens'])){
                      $_SESSION['priceItens'] = 0;
                    }
                    
                    

                    $dao = new DaoItensVendas();
                    $result = $dao->save($itensVendas);
                    if( $result){
                      echo "<script> alert('Inserido com Sucesso!!!')  </script>";
                      $_SESSION['priceItens'] = $_SESSION['priceItens'] + $valor;
                    }

                  }else
                  if(isset($_POST['finaliza'])) {
                    $itensVendas = new ItensVendas();
                    $itensVendas->setVendas_Id_Vendas($_SESSION['id_venda']);
                    $itensVendas->setProduto_Id_Produto($_POST['produto']);
                    $itensVendas->setQuantidade($_POST['quantidade']);
                      
                      $product = $daoproduto->consulta($_POST['produto']);   
                      $valor = $_POST['quantidade'] * $product->getValor();
                    $itensVendas->setValor($valor);
                    
                    if(!isset($_SESSION['priceItens'])){
                      $_SESSION['priceItens'] = 0;
                    }

                    $dao = new DaoItensVendas();
                    $result = $dao->save($itensVendas);
                    if( $result){
                      
                      $_SESSION['priceItens'] = $_SESSION['priceItens'] + $valor;
                    }


                    $venda = new Vendas();
                    $venda->setId_Vendas($_SESSION['id_venda']);
                    $venda->setValor($_SESSION['priceItens']);
                    $daoVendas = new DaoVendas();
                    $resultado = $daoVendas->updatePrice($venda);
                    if($resultado){
                      echo "<script>alert('O Valor total de sua compra foi de R$ ".$_SESSION['priceItens'].",00'); window.location.href='produtoconsulta.php'</script>";
                      $_SESSION['priceItens'] = 0;
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