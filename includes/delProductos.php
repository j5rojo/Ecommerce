<?php
  if($_GET['option']=='delProducto'){
    require_once("conexbd.php");
    $con = conexionBD('localhost', 'root', '', 'shalomimportca');
    $consulta = "DELETE FROM tbl_productos WHERE id_producto='".$_POST['id_del']."'";
    if(mysqli_query($con, $consulta)){
      echo "<script type='text/javascript'>
        window.location='nivelAdministrador.php?section=admProductos&option=verProductos';
      </script>";
    }
  }
?>
