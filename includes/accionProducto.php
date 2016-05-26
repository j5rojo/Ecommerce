
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
  ?>

<?php
//Validaciones Nuevo Producto
  if(isset($_POST['btn-enviar'])){
    if($_POST['nombrep'] == ''){
      echo '<h2 id="error">Debe Escribir un Nombre para su Producto</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").removeClass("placeholder");
                $("#nombrep").addClass("placeholder-error");
                $("#nombrep").focus().css("border-color", "#dd4b39");
                $("#nombrep").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['stockp'] == ''){
      echo '<h2 id="error">Debe Escribir la Cantidad del Producto Disponible</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").removeClass("placeholder");
                $("#stockp").addClass("placeholder-error");
                $("#stockp").focus().css("border-color", "#dd4b39");
                $("#stockp").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif(!preg_match("/^[0-9]+$/",$_POST['stockp'])){
      echo '<h2 id="error">Unicamente puedes Escribir N&uacute;meros</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").removeClass("placeholder");
                $("#stockp").addClass("placeholder-error");
                $("#stockp").focus().css("border-color", "#dd4b39");
                $("#stockp").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['descp'] == ''){
      echo '<h2 id="error">Debe Escribir una Descripcion para el Producto</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").attr("value", "'.$_POST['stockp'].'");
                $("#descp").removeClass("placeholder");
                $("#descp").addClass("placeholder-error");
                $("#descp").focus().css("border-color", "#dd4b39");
                $("#descp").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['preciop'] == ''){
      echo '<h2 id="error">Debe Escribir el Precio del Producto</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").attr("value", "'.$_POST['stockp'].'");
                $("#descp").text("'.$_POST['descp'].'");
                $("#preciop").removeClass("placeholder");
                $("#preciop").addClass("placeholder-error");
                $("#preciop").focus().css("border-color", "#dd4b39");
                $("#preciop").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif(!preg_match("/^[0-9]+$/",$_POST['preciop'])){
      echo '<h2 id="error">Unicamente puedes Escribir N&uacute;meros como Precio</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").attr("value", "'.$_POST['stockp'].'");
                $("#descp").text("'.$_POST['descp'].'");
                $("#preciop").removeClass("placeholder");
                $("#preciop").addClass("placeholder-error");
                $("#preciop").focus().css("border-color", "#dd4b39");
                $("#preciop").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['categoriap']==''){
      echo '<h2 id="error">Escoja una Categoria para el Producto</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").attr("value", "'.$_POST['stockp'].'");
                $("#descp").text("'.$_POST['descp'].'");
                $("#preciop").attr("value", "'.$_POST['preciop'].'");
                $("#categoriap").removeClass("placeholder");
                $("#categoriap").addClass("placeholder-error");
                $("#categoriap").focus().css("border-color", "#dd4b39");
                $("#categoriap").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif(empty($_POST['fotop'])){
      echo '<h2 id="error">Escoja una Foto para el Producto</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombrep").attr("value", "'.$_POST['nombrep'].'");
                $("#stockp").attr("value", "'.$_POST['stockp'].'");
                $("#descp").text("'.$_POST['descp'].'");
                $("#preciop").attr("value", "'.$_POST['preciop'].'");
                $("#categoriap option[value="'.$_POST['categoriap'].'"]").attr("selected", "selected");
                $("#fotop").css("border-color", "#dd4b39");
                $("#fotop").css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }else{
  //Termina Validaciones Nuevo Producto
    }
  }else{
    echo "<h2>Completa los Datos para Agregar un Nuevo Producto</h2>";
  }
?>
