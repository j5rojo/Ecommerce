<?php
$id=$_POST['id'];
require_once('conexbd.php');
$con=conexionBD('localhost', 'root', '', 'shalomimportca');
//Validaciones Nuevo Producto
  if($_POST['nombrep'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un nombre para su producto");
        $("#nombrep").focus();
      });
    </script>';
  }elseif($_POST['stockp'] == ''){
    echo '<script type="text/javascript">
    $(document).ready(function() {
      toastr.warning("Debe escribir la cantidad del producto disponible");
      $("#stockp").focus();
    });
    </script>';
  }elseif(!preg_match("/^[0-9]+$/",$_POST['stockp'])){
    echo '<script type="text/javascript">
    $(document).ready(function() {
      toastr.warning("\u00DAnicamente puedes escribir n\u00FAmeros");
      $("#stockp").focus();
    });
    </script>';
  }elseif($_POST['descp'] == ''){
    echo '<script type="text/javascript">
    $(document).ready(function() {
      toastr.warning("Debe escribir una descripci\u00F3n para el producto");
      $("#descp").focus();
    });
    </script>';
  }elseif($_POST['preciop'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir el precio del producto");
        $("#preciop").focus()
      });
    </script>';
  }elseif(!preg_match("/^[0-9]+$/",$_POST['preciop'])){
    echo '<script type="text/javascript">
    $(document).ready(function() {
      toastr.warning("\u00DAnicamente puedes escribir n\u00FAmeros como precio");
      $("#preciop").focus()
    });
    </script>';
  }elseif($_POST['categoriap']==''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escoger una categoria para el producto");
        $("#categoriap").focus()
      });
    </script>';
  }elseif($_POST['destacadop']==''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escoger si quiere destacar o no su producto");
        $("#destacadop").focus()
      });
    </script>';
  }
  // elseif($_FILES['fotop']['error'] == UPLOAD_ERR_NO_FILE){
  //   $foto="SELECT fotoName_producto, fotoExtension_producto, fotoBinario_producto FROM tbl_productos WHERE id_producto='$id'";
  //   $resultfoto=mysqli_query($con, $foto);
  //   $pic=mysqli_fetch_assoc($resultfoto);
  //   $fileName=$pic['fotoName_producto'];
  //   $fileExtension=$pic['fotoExtension_producto'];
  // }
  else{
    // if(isset($_FILES['fotop'])){
    //   $file = $_FILES['fotop'];
    //   $temName = $file['tmp_name'];
    //   $fileName = $file['name'];
    //   $fileExtension = substr(strrchr($fileName, '.'), 1);
    //   $fp = fopen($temName, "rb");
    //   $contenido = fread($fp, filesize($temName));
    //   $contenido = addslashes($contenido);
    //   fclose($fp);
    // }
    $nombrep=$_POST['nombrep'];
    $stockp=$_POST['stockp'];
    $descp=$_POST['descp'];
    $preciop=$_POST['preciop'];
    $categoriap=$_POST['categoriap'];
    $destacadop=$_POST['destacadop'];
    $query = "UPDATE tbl_productos SET
             nombre_producto='$nombrep',
             cantidad_producto='$stockp',
             descripcion_producto='$descp',
             precio_producto='$preciop',
            --  fotoName_producto='$fileName',
            --  fotoExtension_producto='$fileExtension',
            --  fotoBinario_producto='$contenido',
             categoria_producto='$categoriap',
             destacado_producto='$destacadop'
           WHERE id_producto='$id'";
    if(mysqli_query($con, $query)){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.success("El producto ha sido actualizado satisfactoriamente");
          $("#respuesta").html("<h2>Producto Modificado</h2>");
          setTimeout(function(){
            window.location="nivelAdministrador.php?section=admProductos&option=verProductos";
          }, 5000);
        })
      </script>';
    }else{
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.error("No se ha podido modificar el producto");
          $("#respuesta").html("<h2>No se ha podido modificar el producto</h2>");
        })
      </script>';
    }
  }
?>
