  <?php 
    require_once "../dao/daoproduto.class.php";
    require_once "../class/produto.class.php";
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
                  <a href=""><span class="black-text name">Leo Vitor</span></a>
                  <a href=""><span class="black-text email">leo@idm.com</span></a>
                </div>
              </li>
              <li><div class="divider"></div></li>
              <li class=" grey darken-1 active"><a class="waves-effect" href="a.php">Home</a></li>
              <li><div class="divider"></div></li>
              <li><a href="http://localhost/vendas/paginas/layout.php">Table</a></li>
              <li><div class="divider"></div></li>
            </ul>
          </div>
        </div>
        <!-- sidebar -->
        <div class="main-panel">
          <!-- navbar -->
          <nav class="grey darken-3 " >
            <div class="nav-wrapper">
              <a class="brand-logo center">Logo</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">JavaScript</a></li>
              </ul>
              <audio autoplay>
                  <source src="http://localhost/vendas/paginas/fonts/roboto/audios.mp3" type="audio/mp3">
                </audio>
            </div>
          </nav>
          <!-- navbar -->
          <a class="btn hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a>
          <!-- Page -->
          <div class="row">
            <div class="col s6 offset-s3">
              <form method="POST" class="card-panel">
                <div class="row">
                  <div class="col s6 input-field">
                    <input type="text" name="nome" id="nome">
                    <label for="nome">Nome do Produto</label>
                  </div>
                  <div class="col s6 input-field">
                    <input type="text" name="valor" id="valor">
                    <label for="valor">Valor do Produto</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 center">
                    <button class="btn waves-effect waves-light grey darken-1" type="submit" name="submit"></i>Cadastrar</button>
                  </div>
                </div>
                <?php
                  if (isset($_POST['submit'])) {
                    $produto = new Produto();
                    $produto->setNome($_POST['nome']);
                    $produto->setValor($_POST['valor']);

                    $dao = new DaoProduto();
                    if($dao->save($produto)){
                      echo "<script> alert('Cadastro efetuado')  </script>";
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
          $(".btn").sideNav({
            menuWidth: 250,
          });
        })
      </script>
    </body>
  </html>

  <!-- <a class="btn hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a> -->