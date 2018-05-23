  <?php
    require_once "../class/estado.class.php";
    require_once "../dao/daoestado.class.php";
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
      <title>Cadastro de Usuario</title>
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
                <select>
                  <option value="" disabled selected>Selecione a Cidade</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                </select>
              </div>
            </div>
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
        