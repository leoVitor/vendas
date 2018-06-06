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
      <title>Cadastro de Estado</title>
    </head>

    <body>
      <!-- Menu Superior -->
      <nav>
        <div class="nav-wrapper">
          <a class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
          </ul>
        </div>
      </nav>
      <!-- Formulário -->
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s6 input-field">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome do Estado</label>
              </div>
              <div class="col s6 input-field">
                <input type="text" name="uf" id="uf">
                <label for="uf">Sigla</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button id="submit" class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
              if (isset($_POST['submit'])) {
                $estado = new Estado();
                $estado->setNome($_POST['nome']);
                $estado->setUf($_POST['uf']);

                $dao = new DaoEstado();
                if($dao->save($estado)){
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
    </body>
  </html>