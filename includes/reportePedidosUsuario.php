<?php
  session_start();
	include('conexbd.php');
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  $codOrdenCompra=$_POST['codOrdenCompra'];
  $codCompra=$_POST['codCompra'];
  $fechaCompra=$_POST['fechaCompra'];
  $usuario=$_SESSION['usuario'];
	$total=0;

	$contenidoPdf="
		<page>
		<table align='center' style='font-size:20px;'>
			<tr>
				<td align='center' rowspan='2'><img src='../images/LOGO.jpg' style='width:300px;height:150px;'/></td>
				<td align='center'>Numero de Orden: ".$codOrdenCompra."</td>
			</tr>
			<tr><td align='center'>Fecha: ".$fechaCompra."</td></tr>
			<tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td align='center' colspan='2' style='font-weight:bold;font-size:32px;'>Orden de Compra</td>
			</tr>
			<tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td align='center' colspan='2' style='font-weight:bold;'>Datos del Cliente</td>
			</tr>
      <tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td>Nombre y Apellido:</td>
				<td>".$_SESSION['nombre']." ".$_SESSION['apellido']."</td>
			</tr>
      <tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td>Tel&eacute;fono:</td>
				<td>".$_SESSION['telefono']."</td>
			</tr>
      <tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td>Correo Electr&oacute;nico:</td>
				<td>".$_SESSION['correo']."</td>
			</tr>
			<tr><td colspan='2'>&nbsp;</td></tr>
			<tr><td colspan='2'>
	";
	$contenidoPdf.="
		<table>
			<tr>
				<td colspan='7' align='center' style='font-weight:bold;'>Detalles de la Compra</td>
			</tr>
			<tr><td colspan='7'>&nbsp;</td></tr>
			<tr>
				<td align='center'>Cantidad</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='center'>Productos</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='center'>Precio Unitario</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='center'>SubTotal</td>
			</tr>
			<tr><td colspan='7'>&nbsp;</td></tr>
	";
	$productos="SELECT * FROM tbl_pedidos WHERE codigo_pedido='$codCompra' AND usuario_pedido='$usuario'";
	$reProductos=mysqli_query($con,$productos);
	while($finalProductos=mysqli_fetch_array($reProductos,MYSQLI_ASSOC)){
		$contenidoPdf.="
			<tr>
				<td align='center'>".$finalProductos['cantidadProducto_pedido']."</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td>".$finalProductos['producto_pedido']."</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='right'>".$finalProductos['totalprecio_pedido']/$finalProductos['cantidadProducto_pedido']." Bs.F</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='right'>".$finalProductos['totalprecio_pedido']."</td>
			</tr>
		";
		$total=$total+$finalProductos['totalprecio_pedido'];
	}
	$contenidoPdf.="
		<tr><td colspan='7'>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr>
			<td colspan='6' align='right'>Precio Total:&nbsp;</td>
			<td align='right'>".$total." Bs.F</td>
		</tr>
		</table></td></tr></table></page>
		<page_footer><div align='right'>Orden de Compra Solo Valida por los Proximos 5 Dias Habiles</div></page_footer>
	";
 	require_once('../class/html2pdf/html2pdf.class.php');
  $reporteComprasUsuario = new HTML2PDF('P','A4','fr');
  $reporteComprasUsuario->WriteHTML($contenidoPdf);
  $reporteComprasUsuario->Output('reporteComprasUsuario.pdf');
?>
