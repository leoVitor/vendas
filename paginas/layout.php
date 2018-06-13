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
      <div class="wrapper">
        <div class="sidebar ">
          <div class="sidebar-wrapper ">
            <ul id="slide-out" class="side-nav fixed ">
              <li>
                <div class="user-view">
                  <div class="background">
                    <img src="img/banner2.png">
                  </div>
                  <a ><img class="circle" src="img/user.jpeg"></a>
                  <a ><span class="white-text name">Leo Vitor</span></a>
                  <a ><span class="white-text email">leo@idm.com</span></a>
                </div>
              </li>
              <li><div class="divider"></div></li>
              <li><a class="waves-effect" href="a.php">Home</a></li>
              <li><div class="divider"></div></li>
              <li class=" grey darken-1 active"><a href="http://localhost/vendas/paginas/layout.php">Table</a></li>
              <li><div class="divider"></div></li>
            </ul>
          </div>
          <a class="btn hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a>
        </div>
        <div class="main-panel"> 
          <nav class="grey darken-3">
            <div class="nav-wrapper">
              <a class="brand-logo center">Logo</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">JavaScript</a></li>
              </ul>
            </div>
          </nav>
          <a class="btn hide-on-large-only" data-activates="slide-out"><i class="material-icons">menu</i></a>
          <div class="row">
            <div class="col s6 offset-s3">
              <table class="bordered highlight centered">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

              <tbody>
                <?php
                  $dao = new DaoProduto();
                  $resultado = $dao->getAll();
                  if($resultado != NULL){
                    foreach ($resultado as $key => $value) {
                      echo "<tr>";
                        echo "<td>{$value->getId_Produto()}</td>";
                          echo "<td>{$value->getNome()}</td>";
                          echo "<td>{$value->getValor()}</td>";
                          echo "<td><a href='produtoalterar.php?id_produto={$value->getId_Produto()}'><i class='material-icons'>update</i> </a> </td>";
                          echo "<td><a href='produtodeletar.php?id_produto={$value->getId_Produto()}'><i class='material-icons'>delete</i> </a> </td>";
                        echo "</tr>";
                    }
                  }
                ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
       <div class="fixed-action-btn">
        <a href="produtocadastro.php" class="btn-floating pulse btn-large waves-effect waves-light grey darken-4"><i class="material-icons">add</i></a>
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