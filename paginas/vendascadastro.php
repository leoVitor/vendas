<?php
  require_once "../dao/daovendas.class.php";
  require_once "../class/vendas.class.php";
  require_once "../dao/daocliente.class.php";
  require_once "../class/cliente.class.php";
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
                echo "<select name='cliente' id='cliente' required>";
                echo "<option value='' disabled selected>Selecione o Cliente</option>";
                $daocliente = new DaoCliente();
                $clientes = $daocliente->getAll();
                
                if($clientes != null)
                  foreach ($clientes as $key => $cliente) {
                    echo "<option value='{$cliente->getId_Cliente()}'>{$cliente->getNome()}</option>";
                  }
                 
                 else echo "null";
                echo "</select>";
                echo "<label>Clientes</label>"
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col s6 input-field">
                <input type="date" name="data" id="data">
                <label for="data"></label>
              </div>
              <div class="col s6 input-field">
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
                $vendas = new Vendas();
                $vendas->setCliente_Id_Cliente($_POST['cliente']);
                $vendas->setData($_POST['data']);
                $vendas->setValor($_POST['valor']);
                
                $dao =new DaoVendas();
                if($dao->save($vendas)){
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
      <script type="text/javascript">
        $(document).ready(function() {
          $('select').material_select();
        });
      </script>
    </body>
  </html>