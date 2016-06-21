<?php
  if($_GET['option']=='delCategoria'){
    require_once("conexbd.php");
    $con = conexionBD('localhost', 'root', '', 'shalomimportca');
    $consulta = "DELETE FROM tbl_categorias WHERE id_categoria='".$_POST['id_del']."'";
    if(mysqli_query($con, $consulta)){
      echo "<script type='text/javascript'>
        window.location='nivelAdministrador.php?section=admProductos&option=verCategorias';
      </script>";
    }
  }
?>
