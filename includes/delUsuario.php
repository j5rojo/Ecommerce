<?php
  session_start();
  require_once('conexbd.php');
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  if($_SESSION['autentificado']=="SI" && $_SESSION['nivel']==0 && isset($_POST['eliminar'])){
      $consulta = "DELETE FROM tbl_usuarios WHERE id_usuario='".$_POST['codUsuario']."'";
      if(mysqli_query($con, $consulta)){
        echo "
          <script type='text/javascript'>
              window.location='../nivelAdministrador.php?section=usuarios&del=true';
          </script>
        ";
      }else{
        echo "
          <script type='text/javascript'>
              window.location='../nivelAdministrador.php?section=usuarios';
          </script>
        ";      }
  }
?>
