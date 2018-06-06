<?php
  require_once "../dao/daoproduto.class.php";
  require_once "../class/produto.class.php";
  $produto = NULL;
   if(isset($_GET["id_produto"])){
       $id = $_GET["id_produto"];
       $dao = new DaoProduto();
       $produto = $dao->consulta($id);
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
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s6 input-field">
                <input type="text" name="nome" id="nome" value="<?php echo $produto->getNome();?>" >
                <label for="nome">Nome do Produto</label>
              </div>
              <div class="col s6 input-field">
                <input type="text" name="valor" id="valor" value="<?php echo $produto->getValor();?>">
                <label for="valor">Valor do Produto</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Alterar</button>
              </div>
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $produto->setNome($_POST['nome']);
                    $produto->setValor($_POST['valor']);

                    if(DaoProduto::alterar($produto)){
                        echo "<script> alert ( 'Alterado com sucesso' ) </script>";
                    }  
                }
              ?>
          </form>
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>