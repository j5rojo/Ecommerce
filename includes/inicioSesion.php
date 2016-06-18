<?php
  $usuario = $_POST['user'];
  $clave = $_POST['pass'];
  if($usuario==''){
    echo '<script type="text/javascript">
      $(document).ready(function(){
        toastr.warning("Escriba su nombre de usuario");
        $("#user").focus();
      })
    </script>';
  }elseif($clave==''){
    echo '<script type="text/javascript">
      $(document).ready(function(){
        toastr.warning("Escriba su contraseña");
        $("#pass").focus();
      })
    </script>';
  }else{
    require_once('conexbd.php');
    $con =  conexionBD('localhost', 'root', '', 'shalomimportca');
    $consulta = "SELECT username_usuario, contrasenia_usuario FROM tbl_usuarios WHERE username_usuario='$usuario'";
    if($resultado = mysqli_query($con, $consulta)){
      $checkUser = mysqli_fetch_assoc($resultado);
      if(mysqli_num_rows($resultado)==0){
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.warning("No existe el usuario '.$usuario.'");
            $("#user").focus();
          })
        </script>';
      }elseif($checkUser['contrasenia_usuario']!=$clave){
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.warning("Su contraseña es incorrecta");
            $("#pass").focus();
          })
        </script>';
      }elseif(mysqli_num_rows($resultado)>0 && $checkUser['username_usuario']==$usuario && $checkUser['contrasenia_usuario']==$clave){
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.success("Bienvenido, será redirigido en unos segundos...");
          })
        </script>';
        mysqli_free_result($resultado);
        $consulta = "SELECT * FROM tbl_usuarios WHERE username_usuario='$usuario'";
        $resultado = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_assoc($resultado);
        session_start();
        $_SESSION['id']=$fila['id_usuario'];
      	$_SESSION['nombre']=$fila['nombre_usuario'];
      	$_SESSION['apellido']=$fila['apellido_usuario'];
      	$_SESSION['telefono']=$fila['telefono_usuario'];
      	$_SESSION['correo']=$fila['correo_usuario'];
        $_SESSION['usuario']=$fila['username_usuario'];
        $_SESSION['nivel']=$fila['nivel_usuario'];
        if($_SESSION['nivel']==1){
          $_SESSION['autentificado']= "SI";
          echo "
            <script>
              setTimeout(function(){
                window.location='nivelUsuario.php';
              }, 6500);
            </script>
          ";
        }
      }else{
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.error("Lo sentimos, no se ha podido iniciar sesión. Intente más tarde");
          })
        </script>';
      }
    }
  }
?>
