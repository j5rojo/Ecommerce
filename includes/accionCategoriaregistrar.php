<?php
//Validaciones Nuevo Producto
  if($_POST['nombrec'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un nombre para tu categoria");
        $("#nombrec").focus();
      });
    </script>';
  }elseif($_POST['categoriap']==''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escoger un Tipo de Categoria");
        $("#categoriap").focus()
      });
    </script>';
  }else{
    require_once('conexbd.php');
    $con=conexionBD('localhost', 'root', '', 'shalomimportca');
    $nombrec=$_POST['nombrec'];
    $categoriap=$_POST['categoriap'];
    $query = "INSERT INTO tbl_categorias (
      id_categoria,
      nombre_categoria,
      tipo_categoria)
    VALUES(
      NULL,
      '$nombrec',
      '$categoriap')";
    if(mysqli_query($con, $query)){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.success("La categoria ha sido agregada satisfactoriamente");
          $("#respuesta").html("<h2>Categoria Agregado</h2>");
          setTimeout(function(){
            location.reload();
          }, 5000);
        })
      </script>';
    }else{
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.error("La categoria no ha podido ser agregada");
          $("#respuesta").html("<h2>No se Pudo Agregar la Categoria</h2>");
        })
      </script>';
    }
  }
?>
