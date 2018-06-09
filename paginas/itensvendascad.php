<?php
  require_once "../class/itensvendas.class.php";
  require_once "../dao/daoitensvendas.class.php";
  require_once "../class/vendas.class.php";
  require_once "../dao/daovendas.class.php";
  require_once "../class/produto.class.php";
  require_once "../dao/daoproduto.class.php";
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
      <title>Cadastro de Dados</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
          <div class="row">
              <div class="col s12">
                <?php
                echo "<select name='venda' id='venda' required>";
                echo "<option value='' disabled selected>Selecione a Venda</option>";
                $daovendas = new DaoVendas();
                $vendidos = $daovendas->getAll();
                
                if($vendidos != null)
                  foreach ($vendidos as $key => $vendas) {
                    echo "<option value='{$vendas->getId_Vendas()}'>{$vendas->getCliente_Id_Cliente()}</option>";
                  }
                 
                 else echo "null";
                echo "</select>";
                echo "<label>Vendas</label>"
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <?php
                echo "<select name='produto' id='produto' required>";
                echo "<option value='' disabled selected>Selecione o Produto</option>";
                $daoproduto = new DaoProduto();
                $produtos = $daoproduto->getAll();
                
                if($produtos != null)
                  foreach ($produtos as $key => $produto) {
                    echo "<option value='{$produto->getId_Produto()}'>{$produto->getNome()}</option>";
                  }
                 
                 else echo "null";
                echo "</select>";
                echo "<label>Produtos</label>"
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <input type="number" name="quantidade" id="quantidade" value="1">
                <label for="quantidade">Quantidade</label>
              </div>
              <div class="col s12 input-field">
                <input type="text" name="valor" id="valor">
                <label for="valor">Valor</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
                if (isset($_POST['submit'])) {
                $itensvendas = new ItensVendas();
                $itensvendas->setVendas_Id_Vendas($_POST['venda']);
                $itensvendas->setProduto_Id_Produto($_POST['produto']);
                $itensvendas->setQuantidade($_POST['quantidade']);
                $itensvendas->setValor($_POST['valor']);


                $dao = new DaoItensVendas();
                if ($dao->save($itensvendas)) {
                  echo "<script> alert('Cadastro efetuado')  </script>";
                }
              }
            ?>
          </form>
        </div>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
        $(document).ready(function() {
            $('select').material_select();
        });
      </script>
    </body>
  </html>


    