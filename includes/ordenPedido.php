<?php
	$consultaOrdenId="SELECT id_ordenPedido FROM tbl_ordenpedidos WHERE codigo_pedido='$uniqId'";
	$ejecutarConsulta=mysqli_query($con,$consultaOrdenId);
	$resultadoConsulta=mysqli_fetch_assoc($ejecutarConsulta);
	$total=0;
	$ordenPedido="
		<page>
		<table align='center' style='font-size:20px;'>
			<tr>
				<td align='center' rowspan='2'><img src='images/LOGO.jpg' style='width:300px;height:150px;'/></td>
				<td align='center'>Numero de Orden: ".$resultadoConsulta['id_ordenPedido']."</td>
			</tr>
			<tr><td align='center'>Fecha: ".date('d-m-Y')."</td></tr>
			<tr><td colspan='2'>&nbsp;</td></tr>
			<tr>
				<td align='center' colspan='2' style='font-weight:bold;font-size:32px;'>Orden del Pedido</td>
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
	$ordenPedido.="
		<table>
			<tr>
				<td colspan='7' align='center' style='font-weight:bold;'>Detalles del Pedido</td>
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
	$detalles="SELECT producto_pedido, cantidadProducto_pedido, totalprecio_pedido FROM tbl_pedidos WHERE codigo_pedido='$uniqId'";
	$resultDetalles=mysqli_query($con,$detalles);
	while($filaDetalles=mysqli_fetch_array($resultDetalles,MYSQLI_ASSOC)){
		$ordenPedido.="
			<tr>
				<td align='center'>".$filaDetalles['cantidadProducto_pedido']."</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td>".$filaDetalles['producto_pedido']."</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='right'>".$filaDetalles['totalprecio_pedido']/$filaDetalles['cantidadProducto_pedido']." Bs.F</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<td align='right'>".$filaDetalles['totalprecio_pedido']."</td>
			</tr>
		";
		$total=$total+$filaDetalles['totalprecio_pedido'];
	}
	$ordenPedido.="
		<tr><td colspan='7'>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr>
			<td colspan='6' align='right'>Precio Total:&nbsp;</td>
			<td align='right'>".$total." Bs.F</td>
		</tr>
		</table></td></tr></table></page>
		<page_footer><div align='right'>Orden de Compra Solo V&aacute;lida por los Pr&oacute;ximos 5 D&iacute;as H&aacute;biles</div></page_footer>
	";
	require_once('class/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($ordenPedido);
?>
