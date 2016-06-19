<?php
  $carrito=$_SESSION['carrito'];
	if(!isset($_POST['c']) && $_POST['c']==''){
    echo "<script type='text/javascript'>
            history.back();
          </script>";
  }else{?>
    <div class="row center-xs">
      <div class="col-xs-10">
        <table class="datosUsuario carrito">
          <caption>
            <h2>¿Estos son los productos que quieres pedir?</h2>
          </caption>
          <tr>
            <td class="primero">Producto</td>
            <td class="primero">Cantidad a Comprar</td>
            <td class="primero">Precio</td>
            <td class="primero">SubTotal</td>
          </tr><?php
          if(isset($carrito)){
            $total=0;
            for($i=0;$i<count($carrito);$i++){
            if($carrito[$i]<>NULL){?>
              <tr><?php
                $subtotalProducto=$carrito[$i]['precio']*$carrito[$i]['cantidad'];
                $total=$total+$subtotalProducto;?>
                <td class="segundo"><?php echo $carrito[$i]['nombre']?></td>
                <td class="segundo"><?php echo $carrito[$i]['cantidad']?></td>
                <td class="segundo"><?php echo $carrito[$i]['precio']." Bs.F"?></td>
                <td class="segundo"><?php echo $subtotalProducto." Bs.F"?></td>
              </tr><?php
            }
          }
        }?>
        <tr>
          <td class="tercero" colspan="4"><?php if(isset($total)) echo "Total: ".$total." Bs.F"?></td>
        </tr>
        <tr>
          <td colspan="4"><?php
				    require_once('includes/conexbd.php');
            $con=conexionBD('localhost', 'root', '', 'shalomimportca');
			  	  $uniqId=uniqid();
			  	  $consulta="INSERT INTO tbl_ordenpedidos (id_ordenPedido, codigo_pedido,status_pedido)VALUES (NULL,'$uniqId','Pendiente')";
			  	  mysqli_query($con, $consulta);
			  	  if(!isset($i)){
              echo "<script type='text/javascript'>
                      window.location='nivelUsuario.php?section=productos'
                    </script>";
            }else{
              echo'<form class="form" name="solicitarProductos" method="post" action="nivelUsuario.php?section=pedido">
				    	       <input type="hidden" name="uniqId" value="'.$uniqId.'"/>
                     <div class="row groupButton center-xs">
                       <button type="submit">Pedir Productos</button>
                       <a href="nivelUsuario.php?section=carrito">Cancelar</a>
                     </div>
                   </form>';
            }}?>
          </td>
        </tr>
      </table>
    </div>
  </div>
