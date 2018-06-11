<?php
  require_once "../dao/daousuario.class.php";
  require_once "../class/usuario.class.php";
 $usuario = NULL;
   if(isset($_GET['id_usuario'])){
       $id = $_GET['id_usuario'];
       $dao = new DaoUsuario();
       $usuario = $dao->delete($id);
       echo "<script> alert('excluído com sucesso'); window.location.href='usuarioconsulta.php';</script>";
   }
?>
