<?php
  require_once "../dao/daoendereco.class.php";
  require_once "../class/endereco.class.php";
 $endereco = NULL;
   if(isset($_GET['id_endereco'])){
       $id = $_GET['id_endereco'];
       $dao = new DaoEndereco();
       $endereco = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='enderecoconsulta.php';</script>";
   }
?>
