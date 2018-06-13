<?php
  require_once "../dao/daovendas.class.php";
  require_once "../class/vendas.class.php";
  require_once "../dao/daocliente.class.php";
  require_once "../class/cliente.class.php";
  require_once "../con/conexao.class.php";

  $vendas = NULL;
  if(isset($_GET["id_vendas"])){
      $id = $_GET["id_vendas"];
      $dao = new DaoVendas();
      $vendas = $dao->getOne($id);
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
      <title>Cadastro de Dados</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s12">
                <?php
                $idcliente = $vendas->getCliente_Id_Cliente();

                $daoCliente = new DaoCliente();
                $cliente = $daoCliente->buscar($idcliente);
                echo "<select name='cliente' id='cliente' required>";
                echo "<option value='' disabled selected>Selecione o Cliente</option>";
                echo "<option value='".$cliente->getId_Cliente()."'  selected>".$cliente->getNome()."</option>";
                
                
                /*$clientes = $daoCliente->getAll();                       
                
                if($clientes != null)
                  foreach ($clientes as $key => $value) {
                    echo "<option value='{$value->getId_Cliente()}'>{$value->getNome()}</option>";

                  }
                 
                 else echo "null";*/

                 $conexao = new Conexao();
                 $con = $conexao->connection();
                 $sql = "SELECT `idcliente`, `nome` FROM `cliente` ORDER BY `nome` ASC";
                 $result = mysqli_query($con,$sql);

                 if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     echo "<option value='{$row['idcliente']}'>{$row['nome']}</option>";
                   }
                 }
                 mysqli_close($con);

                echo "</select>";
                echo "<label>Clientes</label>";
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col s6 input-field">
                <input type="date" name="data" id="data" value="<?php echo $vendas->getData();?>">
                <label for="data"></label>
              </div>
              <div class="col s6 input-field">
                <input type="number" name="valor" id="valor" value="<?php echo $vendas->getValor();?>">
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
                  var_dump($_POST['cliente']);
                $vendas->setCliente_Id_Cliente($_POST['cliente']);
                $vendas->setData($_POST['data']);
                $vendas->setValor($_POST['valor']);
                
                if($dao->update($vendas)){
                    echo "<script>alert('Alterado com sucesso'); window.location.href='vendasconsulta.php';</script>";
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