<?php
session_start();
require_once('includes/conexbd.php');
require_once('class/class.phpmailer.php');
$con = conexionBD('localhost', 'root', '', 'shalomimportca');
$carrito = $_SESSION['carrito'];
$para  = $_SESSION['correo'];
$titulo = 'Reporte de Pedido Shalom  Import, C.A.';
if(isset($carrito)){
  $total=0;
  for($i=0;$i<count($carrito);$i++){
    if($carrito[$i]<>NULL){
      $subtotalProducto=$carrito[$i]['precio']*$carrito[$i]['cantidad'];
      $total=$total+$subtotalProducto;
  	  $idProducto=$carrito[$i]['id'];
  	  $nombreProducto=$carrito[$i]['nombre'];
  	  $cantidadProducto=$carrito[$i]['cantidad'];
  	  $usuario=$_SESSION['usuario'];
      $idUsuario=$_SESSION['id'];
  	  $uniqId=$_POST['uniqId'];
  	  $actualizarStock="UPDATE tbl_productos SET cantidad_producto = cantidad_producto - ".$cantidadProducto." WHERE id_producto = ".$idProducto."";
  	  mysqli_query($con,$actualizarStock);
  	  $consulta="INSERT INTO tbl_pedidos (
        id_pedido,
  		  codigo_pedido,
  		  date_pedido,
  		  usuario_pedido,
  		  producto_pedido,
  		  cantidadProducto_pedido,
  		  totalprecio_pedido)
  	  VALUES(
        NULL,
  		  '$uniqId',
  		  NOW(),
  		  '$usuario',
  		  '$nombreProducto',
  		  '$cantidadProducto',
  		  '$subtotalProducto Bs.F')";
  	  mysqli_query($con, $consulta);
    }
  }
  require_once("includes/ordenPedido.php");
  $name = "pedido#".$uniqId.".pdf";
  $html2pdf->Output($name, 'F');
  $body = "
    <img src='images/LOGO.jpg' style='width:300px;height:150px;' alt='Shalom Import, C.A.' />
    <h1>Gracias por usar Nuestros Servicios</h1>
    <p>Se ha anexado un archivo pdf con el resumen de tus operaciones.</p>
    <p>En los pr&oacute;ximos d&iacute;as dirigete a nuestra tienda ubicada en el C.C. Galerias Plaza para completar la compra de tus productos.</p>
    <p>La orden del pedido no cuenta como una factura. Debes formalizar la compra para generarte la facturaci&oacute;n.</p>
  ";
  $mail = new PHPMailer();
  $mail->setFrom('pedidos@shalomimport.com', 'Shalom Import, C.A.');
  $mail->addReplyTo('pedidos@shalomimport.com', 'Shalom Import, C.A.');
  $mail->addAddress($para, "Shalom Import C.A.");
  $mail->Subject = $titulo;
  $mail->msgHTML($body);
  $mail->addAttachment($name);
  if($mail->send()){
    ?>
    <div class="row center-xs">
      <div class="col-xs-10">
        <table>
          <tr><td align="center"><h2>Gracias por tu Pedido</h2></td></tr>
          <tr><td align="justify"><p>Tu transacci&oacute;n ha sido exitosa y te hemos enviado por correo electr&oacute;nico un reporte de tu pedido. En los pr&oacute;ximos d&iacute;as nos pondremos en contacto contigo para formalizar el proceso.</p></td></tr>
        </table>
      </div>
      <div>
        <div class="groupButton">
          <a href="nivelUsuario.php?section=mispedidos">Ver Mis Compras Realizadas</a>
        </div><br>
      </div>
    </div>
    <?php
  unset($_SESSION['carrito']);
  unlink($name);
  }
}else{
   echo "<script type='text/javascript'>
   	window.location='nivelUsuario.php?section=productos'
   </script>";
}
?>
