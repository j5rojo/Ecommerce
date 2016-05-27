<?php
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
  }elseif($_FILES['fotop']['error'] == UPLOAD_ERR_NO_FILE){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe elegir una foto para el producto, haga click en \"Seleccionar Foto\" ");
      });
    </script>';
  }else{
    if(isset($_FILES['fotop'])){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          $(".fotop").html("'.$_FILES['fotop']['name'].'").attr("disabled", "disabled");
        });
      </script>';
    }
    require_once('conexbd.php');
    $con=conexionBD('localhost', 'root', '', 'shalomimportca');
    $nombrep=$_POST['nombrep'];
    $stockp=$_POST['stockp'];
    $descp=$_POST['descp'];
    $preciop=$_POST['preciop'];
    $categoriap=$_POST['categoriap'];
    $destacadop=$_POST['destacadop'];
    $file = $_FILES['fotop'];
    $temName = $file['tmp_name'];
    $fileName = $file['name'];
    $fileExtension = substr(strrchr($fileName, '.'), 1);
    $fp = fopen($temName, "rb");
    $contenido = fread($fp, filesize($temName));
    $contenido = addslashes($contenido);
    fclose($fp);
    $query = "INSERT INTO tbl_productos (
      id_producto,
      nombre_producto,
      cantidad_producto,
      descripcion_producto,
      precio_producto,
      fecha_producto,
      fotoName_producto,
      fotoExtension_producto,
      fotoBinario_producto,
      categoria_producto,
      destacado_producto)
    VALUES(
      NULL,
      '$nombrep',
      '$stockp',
      '$descp',
      '$preciop',
      CURDATE(),
      '$fileName',
      '$fileExtension',
      '$contenido',
      '$categoriap',
      '$destacadop')";
    if(mysqli_query($con, $query)){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.success("El producto ha sido agregado satisfactoriamente");
          $("#respuesta").html("<h2>Producto Agregado</h2>");
          /* $("button[name=\"btn-enviar\"]").parent().delay(500).fadeOut("slow");    <---  Esto esta
          $("button[name=\"btn-next\"]").parent().delay(500).fadeIn("slow");          <---  Comentado
          $("button[name=\"btn-next\"]").click(function(){                            <---  por el
            $("#formAgregarproducto, #tipop").delay(500).fadeOut("slow");             <---  momento
          }); */
        })
      </script>';
    }else{
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.error("El producto no ha podido ser agregado");
          $("#respuesta").html("<h2>No se pudo agregar el producto</h2>");
        })
      </script>';
    }
  }
?>
