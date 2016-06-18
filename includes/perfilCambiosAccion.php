<?php
  require_once("conexbd.php");
  $con=conexionBD("localhost", "root", "", "shalomimportca");
  if($_POST['type']=="datos"){
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
    }else{
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $telefono=$_POST['telefono'];
      $correo=$_POST['correo'];
      $usuario=$_POST['usuario'];
      $query="UPDATE tbl_usuarios SET
               nombre_usuario='$nombre',
               apellido_usuario='$apellido',
               telefono_usuario='$telefono',
               correo_usuario='$correo'
             WHERE username_usuario='$usuario'";
      if(mysqli_query($con, $query)){
        session_start();
        $_SESSION['nombre']=$nombre;
        $_SESSION['apellido']=$apellido;
      	$_SESSION['telefono']=$telefono;
      	$_SESSION['correo']=$correo;
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.success("Se han guardado los cambios exitosamente");
            setTimeout(function(){
              location.reload();
            }, 5000);
          })
        </script>';
      }else{
        echo '<script type="text/javascript">
          $(document).ready(function() {
            toastr.error("No se han podido guardar los cambios");
          })
        </script>';
      }
    }
  }elseif($_POST['type']=="clave"){
    session_start();
    $query="SELECT contrasenia_usuario FROM tbl_usuarios WHERE username_usuario='".$_SESSION['usuario']."'";
    $clave=mysqli_fetch_assoc(mysqli_query($con, $query));
    if($_POST['contrasenia']!=$clave['contrasenia_usuario']){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("La contrase\u00F1a no es correcta");
          $("#contrasenia").focus();
        });
        </script>';
    }elseif($_POST['newContrasenia']==""){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Escribe la nueva contrase\u00F1a");
          $("#newContrasenia").focus();
        });
        </script>';
    }elseif($_POST['reNewContrasenia']==""){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Repita la nueva contrase\u00F1a");
          $("#reNewContrasenia").focus();
        });
        </script>';
    }elseif($_POST['newContrasenia']!=$_POST['reNewContrasenia']){
      echo '<script type="text/javascript">
        $(document).ready(function() {
          toastr.warning("Las contrase\u00F1as no coinciden");
          $("#reNewContrasenia").focus();
        });
        </script>';
    }else{
      $usuario=$_POST['usuario'];
      $contrasenia=$_POST['newContrasenia'];
      $consulta="UPDATE tbl_usuarios SET
                contrasenia_usuario='$contrasenia'
                WHERE username_usuario='$usuario'";
      if(mysqli_query($con, $consulta)){
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.success("La contrase\u00F1a ha sido modificada satisfactoriamente");
            setTimeout(function(){
              location.reload();
            }, 5000);
          })
        </script>';
      }else{
        echo '<script type="text/javascript">
          $(document).ready(function() {
            toastr.error("No se ha podido modificar la contrase\u00F1a");
          })
        </script>';
      }
    }
  }
?>
