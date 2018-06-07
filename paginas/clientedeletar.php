<?php
  require_once "../dao/daocliente.class.php";
  require_once "../class/cliente.class.php";
 $cliente = NULL;
   if(isset($_GET['id_cliente'])){
       $id = $_GET['id_cliente'];
       $dao = new DaoCliente();
       $cliente = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='clienteconsulta.php';</script>";
   }
?>
