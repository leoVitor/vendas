<?php 
    require_once("../class/estado.class.php");
    require_once("../dao/daoestado.class.php");
   $estado = NULL;
   if(isset($_GET['id_estado'])){
       $id = $_GET['id_estado'];
       $dao = new DaoEstado();
       $estado = $dao->pesquisarEstado($id);
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
      <title>Alterar Dados</title>
    </head>

    <body>
    <div class="row">
        <div class="col s12">
            <form  method="post">
            <div class="row">
              <div class="col s6 input-field">
                <input type="text" name="nome" id="nome" value="<?php echo $estado->getNome();?>">
                <label for="nome">Nome do Estado</label>
              </div>
              <div class="col s6 input-field">
                <input type="text" name="uf" id="uf" value="<?php echo $estado->getUf();?>">
                <label for="uf">Sigla</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 center">
                <button id="submit" class="btn waves-effect waves-light" type="submit" name="submit"></i>Cadastrar</button>
              </div>
            </div>
            <?php
            if(isset($_POST['submit'])){
                $estado->setNome($_POST['nome']);
                $estado->setUf($_POST['uf']);
                $dao = new DaoEstado();
                if($dao->update($estado)){
                    echo "<script>alert('Alterado com sucesso')</script>";
                }          
            }
            ?>
            </form>
        </div>
    </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
        
