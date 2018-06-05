  <?php
    require_once "../class/cidade.class.php";
    require_once "../dao/daocidade.class.php";
    require_once "../class/endereco.class.php";
    require_once "../dao/daoendereco.class.php";
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
              <div class="col s12 input-field">
                <input type="text" name="logradouro" id="logradouro">
                <label for="logradouro">Logradouro</label>
              </div>
              <div class="col s12 input-field">
                <input type="text" name="cep" id="cep">
                <label for="cep">CEP</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 input-field">
                <input type="text" name="numero" id="numero">
                <label for="numero">Numero</label>
              </div>
              <div class="col s12 input-field">
                <input type="text" name="complemento" id="complemento">
                <label for="complemento">Complemento</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <?php
                  echo "<select name='cidade' id='cidade' required>";
                  echo "<option value='' disabled selected>Selecione a Cidade</option>";
                  $daocidade = new DaoCidade();
                  $buscacidade = $daocidade->getAll();
                  
                  if($buscacidade != null)
                    foreach ($buscacidade as $key => $cidade) {
                      echo "<option value='{$cidade->getId_Cidade()}'>{$cidade->getNome()} - {$cidade->getEstado_id_estado()}</option>";
                    }
                  
                  else echo "null";
                  echo "</select>";
                  echo "<label>Cidade</label>"
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
              if(isset($_POST['submit'])){
                $endereco = New Endereco();
                $endereco->setLogradouro($_POST['logradouro']);
                $endereco->setCep($_POST['cep']);
                $endereco->setNumero($_POST['numero']);
                $endereco->setComplemento($_POST['complemento']);
                $endereco->setCidade_Id_Cidade($_POST['cidade']);
                //var_dump($endereco);
              
                
                $dao = new DaoEndereco();
                if($dao->save($endereco)){
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
        