<?php
  require_once('conexbd.php');
  $tipop = $_POST['tipop'];
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  $combobox="SELECT * FROM tbl_categorias WHERE tipo_categoria='".$tipop."'";
  $resultoCombo=mysqli_query($con, $combobox);
  echo '<option value="" selected>Escoja una Categoria para su Producto</option>';
  while($filaCombo=mysqli_fetch_array($resultoCombo,MYSQLI_ASSOC)){
    echo '<option value="'.$filaCombo['id_categoria'].'">'.$filaCombo['nombre_categoria'].'</option>';
  }
  mysqli_close($con);
?>
