<?php
    require_once "../class/cidade.class.php";
    require_once "../dao/daocidade.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daoendereco.class.php";

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
      <meta charset="utf-8">
      <title>Alteração de Dados</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
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
        