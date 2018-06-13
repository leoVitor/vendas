<?php
  require_once "../dao/daocidade.class.php";
  require_once "../class/cidade.class.php";
  require_once "../dao/daoestado.class.php";
  require_once "../class/estado.class.php";

  $cidade = NULL;
   if(isset($_GET["id_cidade"])){
       $id = $_GET["id_cidade"];
       $dao = new DaoCidade();
       $cidade = $dao->buscar($id);
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
      <title>Alterar dados</title>
    </head>

    <body>
      <div class="row">
        <div class="col s6 offset-s3">
          <form method="POST" class="card-panel">
            <div class="row">
              <div class="col s6 input-field">
                <input type="text" name="nome" id="nome" value="<?php echo $cidade->getNome();?>">
                <label for="nome">Nome da Cidade</label>
              </div>
              <div class="col s6 input-field">
                <input type="text" name="sigla" id="sigla" value="<?php echo $cidade->getSigla();?>">
                <label for="sigla">Sigla</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <?php
                $idEstado = $cidade->getEstado_id_estado();

                $daoEstado = new DaoEstado();
                $estado = $daoEstado->pesquisarEstado($idEstado);
                echo "<select name='estado' id='estado' required>";
                echo "<option value='' disabled>Selecione o Estado</option>";
                echo "<option value='".$estado->getId_estado()."'  selected>".$estado->getNome()."</option>";
                $daoestado = new DaoEstado();
                $estados = $daoestado->getAll();
                
                if($estados != null)
                  foreach ($estados as $key => $estado) {
                    echo "<option value='{$estado->getId_estado()}'>{$estado->getNome()}</option>";
                  }
                 
                 else echo "null";
                echo "</select>";
                echo "<label>Estados</label>"
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
                $cidade->setNome($_POST['nome']);
                $cidade->setSigla($_POST['sigla']);
                $cidade->setEstado_id_estado($_POST['estado']);
                $dao = new DaoCidade();
                if($dao->update($cidade)){
                    echo "<script>alert('Alterado com sucesso'); window.location.href='cidadeconsulta.php';</script>";
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