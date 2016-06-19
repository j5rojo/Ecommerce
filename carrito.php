<?php
  if(isset($_POST['idProducto'])){
    $idProducto=$_POST['idProducto'];
    $nombreProducto=$_POST['nombreProducto'];
    $precioProducto=$_POST['precioProducto'];
    $cantidadProducto=$_POST['cantidad'];
    $stock=$_POST['stockProducto'];
    $carrito[]=array(
      'id'=>$idProducto,
      'nombre'=>$nombreProducto,
      'precio'=>$precioProducto,
      'cantidad'=>$cantidadProducto,
      'stock'=>$stock,
    );
  }
  if(isset($_SESSION['carrito'])){
    $carrito=$_SESSION['carrito'];
    if(isset($_POST['idProducto'])){
      $idProducto=$_POST['idProducto'];
      $nombreProducto=$_POST['nombreProducto'];
      $precioProducto=$_POST['precioProducto'];
      $cantidadProducto=$_POST['cantidad'];
      $stock=$_POST['stockProducto'];
      $sumaCantidad=-1;
      for($i=0;$i<count($carrito);$i++){
        if($idProducto==$carrito[$i]['id']){
          $sumaCantidad=$i;
        }
      }
      if($sumaCantidad<>-1){
        $cantidadTotal=$carrito[$sumaCantidad]['cantidad']+$cantidadProducto;
        $carrito[$sumaCantidad]=array(
          'id'=>$idProducto,
          'nombre'=>$nombreProducto,
          'precio'=>$precioProducto,
          'cantidad'=>$cantidadTotal,
          'stock'=>$stock,
        );
      }else{
        $carrito[]=array(
          'id'=>$idProducto,
          'nombre'=>$nombreProducto,
          'precio'=>$precioProducto,
          'cantidad'=>$cantidadProducto,
          'stock'=>$stock,
        );
      }
    }
    }
    if(isset($_POST['viejaCantidad'])){
      $productoUpdate=$_POST['viejaCantidad'];
      $cantidadTotal=$_POST['nuevaCantidad'];
      $carrito[$productoUpdate]['cantidad']=$cantidadTotal;
    }
    if(isset($_POST['eliminarProducto'])){
      $productoEliminar=$_POST['eliminarProducto'];
      $carrito[$productoEliminar]=NULL;
    }
    if(isset($carrito)) $_SESSION['carrito']=$carrito;
?>
    <div class="row center-xs">
      <div class="col-xs-10">
        <table class="datosUsuario carrito">
          <caption>
            <h2>Estos son los productos que llevas hasta ahora</h2>
          </caption>
          <tr>
            <td class="primero">Producto</td>
            <td class="primero">Cantidad a Comprar</td>
            <td class="primero">Precio</td>
            <td class="primero">SubTotal</td>
          </tr>
          <?php
            if(isset($carrito)){
              $total=0;
              $c='';
              for($i=0;$i<count($carrito);$i++){
                if($carrito[$i]<>NULL){
          ?>
          <tr>
            <?php
              $subtotalProducto=$carrito[$i]['precio']*$carrito[$i]['cantidad'];
              $total=$total+$subtotalProducto;
            ?>
            <td class="segundo"><?php echo $carrito[$i]['nombre']?></td>
            <td class="segundo">
              <form method="post" name="actualizarCantidad">
                <input name="viejaCantidad" type="hidden" value="<?php echo $i?>"/>
                <input name="nuevaCantidad" type="number" id="nuevaCantidad" class="input" value="<?php echo $carrito[$i]['cantidad']?>" min="1" max="<?php echo $carrito[$i]['stock'];?>"/>
                <button name="btnUpdateCantidad" id="updateCantidad"><span class="fa fa-refresh"></span></button>
              </form>
            </td>
            <td class="segundo"><?php echo $carrito[$i]['precio']." Bs.F"?></td>
            <td class="segundo subtotal">
              <span><?php echo $subtotalProducto." Bs.F"?></span>
              <form method="post">
                <input name="eliminarProducto" type="hidden" value="<?php echo $i?>"/>
                <button name="btnDeleteProducto" id="deleteProducto"><span class="fa fa-times"></span></button>
              </form>
            </td>
          </tr>
          <?php
            $c++;
                }
              }
            }
          ?>
          <tr>
            <td class="tercero" colspan="4"><?php if(isset($total)) echo "Total: ".$total." Bs.F"?></td>
          </tr>
          <tr>
            <td colspan="4">
            <?php if($c==0){
              unset($c);
              echo "<script type='text/javascript'>
                window.location='nivelUsuario.php?section=productos&error=empty'
              </script>";
              unset($_SESSION['carrito']);
              unset($carrito);
            }else{
              ?>
              <form class="form" name="solicitarProductos" method="post" action="nivelUsuario.php?section=confirmacion">
                <input type="hidden" value="<?php echo $c?>" name="c"/>
                <div class="row groupButton center-xs">
                  <button type="submit">Confirmar Pedido</button>
                </div>
              </form>
              <?php }?>
            </td>
          </tr>
        </table>
      </div>
    </div>
