<?php 
    require_once "../dao/daoproduto.class.php";
    require_once "../class/produto.class.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <!-- Icone da Pagina -->
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <!-- Icone da Pagina -->
    <title>Material Dashboard by Creative Tim</title>
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="" class="simple-text">
                    Name Shop
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="user.php">
                            <i class="material-icons">person</i>
                            <p>Cadastro</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./table.php">
                            <i class="material-icons">content_paste</i>
                            <p>Tabela de Consulta</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Lista de Produtos </a> 
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Consulta</h4>
                                    <p class="category">Produto</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                            <th>Alterar</th>
                                            <th>Excluir</th>
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
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>

</html>