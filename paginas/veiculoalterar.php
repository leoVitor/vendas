<?php
  require_once "../class/veiculo.class.php";
  require_once "../dao/daoveiculo.class.php";

  $veiculo = NULL;
  if(isset($_GET["id_veiculo"])){
      $id = $_GET["id_veiculo"];
      $dao = new DaoVeiculo();
      $veiculo = $dao->busca($id);
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
                <input type="text" name="modelo" id="modelo" value="<?php echo $veiculo->getModelo();?>">
                <label for="modelo">Modelo</label>
              </div>
              <div class="col s6 input-field">
                <input type="number" name="ano" id="ano" value="<?php echo $veiculo->getAno();?>">
                <label for="number">Ano do Veiculo</label>
              </div>
            </div>
            <div class="row">
              <div class="col s6 input-field">
                <input type="text" name="placa" id="placa" value="<?php echo $veiculo->getPlaca();?>">
                <label for="placa">Placa do Veiculo</label>
              </div>
              <div class="col s6 input-field">
                <input type="text" name="chassi" id="chassi" value="<?php echo $veiculo->getChassi();?>">
                <label for="chassi">Número do Chassi</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <input type="text" name="preco" id="preco" value="<?php echo $veiculo->getPreco();?>">
                <label for="preco">Valor do Veiculo</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
              if (isset($_POST['submit'])) {
                $veiculo->setModelo($_POST['modelo']);
                $veiculo->setAno($_POST['ano']);
                $veiculo->setPlaca($_POST['placa']);
                $veiculo->setChassi($_POST['chassi']);
                $veiculo->setPreco($_POST['preco']);


                $dao = new DaoVeiculo();
                if ($dao->update($veiculo)) {
                  echo "<script> alert('Dados Alterados'); window.location.href='veiculoconsulta.php'; </script>";
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


    