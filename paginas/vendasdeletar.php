<?php
  require_once "../dao/daovendas.class.php";
  require_once "../class/vendas.class.php";
 $vendas = NULL;
   if(isset($_GET['id_vendas'])){
       $id = $_GET['id_vendas'];
       $dao = new DaoVendas();
       $vendas = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='vendasconsulta.php';</script>";
   }
?>
