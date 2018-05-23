<?php
  require_once "../dao/daoproduto.class.php";
  require_once "../class/produto.class.php";
 $estado = NULL;
   if(isset($_GET['id_produto'])){
       $id = $_GET['id_produto'];
       $dao = new DaoProduto();
       $estado = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='produtoconsulta.php';</script>";
   }
?>
