<script type="text/javascript">
  toastr.options = {
    "closeButton": true,
    "positionClass": "toast-top-center",
    "extendedTimeOut": "6000",
    "escapeHtml": true,
  }
</script>
<?php
  include_once('conexbd.php');
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  $actualizarStatusVenta="UPDATE tbl_ordenpedidos SET status_pedido='".$_POST['statusVenta']."' WHERE codigo_pedido='".$_POST['codVenta']."'";
  if(mysqli_query($con, $actualizarStatusVenta)){
    echo '<script type="text/javascript">
      $(document).ready(function(){
        toastr.success("Se ha modificado el status del pedido");
        setTimeout(function(){
          window.location="nivelAdministrador.php?section=ventas";
        }, 5000);
      })
    </script>';
  }else{
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.error("No se ha podido hacer la actualizacion del status");
      })
    </script>';
  }
?>
