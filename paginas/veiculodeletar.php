<?php
  require_once "../dao/daoveiculo.class.php";
  require_once "../class/veiculo.class.php";
 $veiculo = NULL;
   if(isset($_GET['id_veiculo'])){
       $id = $_GET['id_veiculo'];
       $dao = new DaoVeiculo();
       $veiculo = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='veiculoconsulta.php';</script>";
   }
?>
