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
    $id=$_POST['id'];
    $con=conexionBD('localhost', 'root', '', 'shalomimportca');
    $nombrec=$_POST['nombrec'];
    $categoriap=$_POST['categoriap'];
    $query = "UPDATE tbl_categorias SET nombre_categoria='$nombrec', tipo_categoria='$categoriap' WHERE id_categoria=$id";
    if(mysqli_query($con, $query)){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.success("La categoria ha sido modificada satisfactoriamente");
          $("#respuesta").html("<h2>Categoria Modificada</h2>");
          setTimeout(function(){
            window.location="nivelAdministrador.php?section=admProductos&option=verCategorias";
          }, 5000);
        })
      </script>';
    }else{
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.error("La categoria no ha podido modificar");
          $("#respuesta").html("<h2>No se Pudo Modificar la Categoria</h2>");
        })
      </script>';
    }
  }
?>
