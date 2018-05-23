<?php
  require_once "../dao/daoestado.class.php";
  require_once "../class/estado.class.php";
 $estado = NULL;
   if(isset($_GET['id_estado'])){
       $id = $_GET['id_estado'];
       $dao = new DaoEstado();
       $estado = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='estadoconsulta.php';</script>";
   }
?>
