<div class="row center-xs">
  <div class="col-xs-12">
    <h1>Usuarios Registrados</h1>
  </div>
  <div class="col-xs-10">
    <div class="row middle-xs center-xs between-xs">
      <?php
        session_start();
        require_once('includes/conexbd.php');
        $con=conexionBD('localhost', 'root', '', 'shalomimportca');
        $consultaUsuario="SELECT * FROM tbl_usuarios WHERE nivel_usuario='1'";
        $ejecutar=mysqli_query($con, $consultaUsuario);
        $numUsu=mysqli_num_rows($ejecutar);
        if($numUsu <= 0){
          echo "
            <div class='col-xs-12'>
              <h3>
                <span class='fa fa-exclamation-circle' style='color: orange;font-size:24px;'></span>&nbsp;
                No hay usuarios registrados
              </h3>
            </div>
          ";
        }
        while($fila=mysqli_fetch_assoc($ejecutar)){
          $div="div".$fila['id_usuario'];
          echo '
            <div class="col-xs-4 usuario">
              <table class="datosUsuario carrito">
                <tr>
                  <td colspan="2" class="primero"><span id="datosUsuario">Usuario: '.$fila["username_usuario"].'</span></td>
                </tr>
                <tr>
                  <td class="segundo" style="font-weight:bold;text-align:left;">Nombre:</td>
                  <td class="segundo" style="text-align:left;">'.$fila["nombre_usuario"].'</td>
                </tr>
                <tr>
                  <td class="segundo" style="font-weight:bold;text-align:left;">Apellido:</td>
                  <td class="segundo" style="text-align:left;">'.$fila["apellido_usuario"].'</td>
                </tr>
                <tr>
                  <td class="segundo" style="font-weight:bold;text-align:left;">Tel&eacute;fono:</td>
                  <td class="segundo" style="text-align:left;">'.$fila["telefono_usuario"].'</td>
                </tr>
                <tr>
                  <td class="segundo" style="font-weight:bold;text-align:left;">Correo:</td>
                  <td class="segundo" style="text-align:left;">'.$fila["correo_usuario"].'</td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align:center">
                    <form action="includes/delUsuario.php" method="post">
                      <input type="hidden" name="codUsuario" value="'.$fila['id_usuario'].'"/>
                      <div class="groupButton row">
                        <button class="col-xs-12 '.$fila['id_usuario'].'" name="eliminar">
                          <span class="fa fa-times"></span>
                          Eliminar
                        </button>
                      </div>
                    </form>
                  </td>
                </tr>
              </table>
            </div>
          ';
        }
      ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  toastr.options = {
    "closeButton": true,
    "positionClass": "toast-top-center",
    "extendedTimeOut": "6000",
    "escapeHtml": true,
  }
</script>
<?php
  if(isset($_GET['del']) && $_GET['del']==true){
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        toastr.success("Usuario Eliminado");
        setTimeout(function(){
          window.location="nivelAdministrador.php?section=usuarios";
        }, 5000);
      })
    </script>';
    <?php
  }
?>
