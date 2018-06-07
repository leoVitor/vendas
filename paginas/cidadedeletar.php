<?php
  require_once "../dao/daocidade.class.php";
  require_once "../class/cidade.class.php";
 $cidade = NULL;
   if(isset($_GET['id_cidade'])){
       $id = $_GET['id_cidade'];
       $dao = new DaoCidade();
       $cidade = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='cidadeconsulta.php';</script>";
   }
?>
