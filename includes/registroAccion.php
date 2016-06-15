<?php
  require_once('conexbd.php');
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  $usuario=$_POST['usuario'];
  $consulta="SELECT * FROM tbl_usuarios WHERE username_usuario='$usuario'";
  $resultado=mysqli_query($con, $consulta);
  $userExist=mysqli_num_rows($resultado);
  echo "<script>console.log('".$userExist."')</script>";
  //Validaciones Registro
    if($_POST['nombre'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir tu nombre");
          $("#nombre").focus();
        });
        </script>';
    }elseif($_POST['apellido'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir tu apellido");
          $("#apellido").focus();
        });
        </script>';
    }elseif($_POST['telefono'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir tu número teléfonico");
          $("#telefono").focus();
        });
        </script>';
    }elseif(!preg_match("/^[0-9]*$/", $_POST['telefono'])){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir un número teléfonico válido");
          $("#telefono").focus();
        });
        </script>';
    }elseif($_POST['correo'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debe escribir su correo electrónico");
          $("#correo").focus();
        });
        </script>';
    }elseif(!preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['correo'])){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir un correo electrónico válido");
          $("#correo").focus();
        });
        </script>';
    }elseif($_POST['usuario'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir un nombre de usuario");
          $("#usuario").focus();
        });
        </script>';
    }elseif($userExist != 0){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("El nombre de usuario ya existe");
          $("#usuario").focus();
        });
        </script>';
    }elseif($_POST['contrasenia'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes escribir una contraseña");
          $("#contrasenia").focus();
        });
        </script>';
    }elseif($_POST['recontrasenia'] == ''){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Debes repetir la contraseña");
          $("#recontrasenia").focus();
        });
        </script>';
    }elseif($_POST['recontrasenia'] != $_POST['contrasenia']){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Las contraseñas no coinciden");
          $("#recontrasenia").focus();
        });
        </script>';
    //Termina Validaciones Registro
    }else{
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $telefono=$_POST['telefono'];
      $correo=$_POST['correo'];
      $contrasenia=$_POST['contrasenia'];
      $query="INSERT INTO tbl_usuarios (
        id_usuario,
        nombre_usuario,
        apellido_usuario,
        telefono_usuario,
        correo_usuario,
        username_usuario,
        contrasenia_usuario,
        nivel_usuario)
      VALUES(
        NULL,
        '$nombre',
        '$apellido',
        '$telefono',
        '$correo',
        '$usuario',
        '$contrasenia',
        '1')";
      if(mysqli_query($con,$query)){
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.success("Se ha registrado satisfactoriamente");
            $("#respuesta").html("<h2 class=\"msj-correcto\">Se ha Registrado satisfactoriamente</h2>");
            setTimeout(function(){
              location.reload();
            }, 5000);
          })
        </script>';
      }else{
        echo '<script type="text/javascript">
          $(document).ready(function() {
            toastr.error("No se ha podido registrar intente más tarde");
            $("#respuesta").html("<h2>No se ha podido registrar intente más tarde</h2>");
          })
        </script>';
      }
    }
?>
