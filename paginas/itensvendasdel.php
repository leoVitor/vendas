<?php
  require_once "../dao/daoitensvendas.class.php";
  require_once "../class/itensvendas.class.php";
 $itensvendas = NULL;
   if(isset($_GET['id_itensvendas'])){
       $id = $_GET['id_itensvendas'];
       $dao = new DaoItensVendas();
       $itensvendas = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='itensvendascon.php';</script>";
   }
?>
