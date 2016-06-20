<div class="row center-xs">
  <div class="col-xs-10">
      <?php
      include('includes/conexbd.php');
      $con=conexionBD('localhost', 'root', '', 'shalomimportca');
      $usuario=$_POST['usuario_pedido'];
      if(isset($_POST['btnBuscar'])){
        $buscar="SELECT * FROM tbl_ordenpedidos WHERE id_ordenPedido=".$_POST['criterio'];
        $reBuscar=mysqli_query($con,$buscar);
        $buscado=mysqli_fetch_assoc($reBuscar);
        $codigoVenta=$buscado['codigo_pedido'];
        $mostrar="SELECT * FROM tbl_pedidos WHERE codigo_pedido='$codigoVenta' AND usuario_pedido='$usuario'";
        $reMostrar=mysqli_query($con,$mostrar);
        ?>
        <table class="datosUsuario carrito">
          <caption>
            <h1>Detalles de la Transacci&oacute;n</h1>
          </caption>
          <tr>
            <td align="left" class="segundo" colspan="2" style="font-weight:bold;">Fecha del Pedido:</td>
            <td align="left" class="segundo" colspan="2"><?php echo $_POST['date_pedido']?></td>
          </tr>
          <tr>
            <td align="left" class="segundo" colspan="2" style="font-weight:bold;">Codigo de la Orden del Pedido:</td>
            <td align="left" class="segundo" colspan="2"><?php echo $buscado['id_ordenPedido']?></td>
          </tr>
          <tr>
            <td align="left" class="segundo" colspan="2" style="font-weight:bold;">Codigo de la Transaccion:</td>
            <td align="left" class="segundo" colspan="2"><?php echo $codigoVenta?></td>
          </tr>
          <tr>
            <td align="left" class="segundo" colspan="2" style="font-weight:bold;">Status del Pedido:</td>
            <td align="left" class="segundo" colspan="2">
              <?php
                if($_POST['status_pedido']=='Pendiente'){
                  echo"<form class='form' id='actualizar'>
                    <select name='statusVenta' class='inputForm'>
                      <option value='".$_POST['status_pedido']."' selected='selected'>".$_POST['status_pedido']."</option>
                      <option value='Confimado'>Confirmado</option>
                    </select>
                    <input type='hidden' value='".$codigoVenta."' name='codVenta'/>
                    <button style='margin-top:0 !important;' name='btnUpdateCantidad' id='updateCantidad' type='button'><span class='fa fa-refresh'></span></button>
                  </form>";
                }else{
                  echo $_POST['status_pedido'];
                }
              ?>
              <script type="text/javascript">
                $("button[name='btnUpdateCantidad']").click(function(){
                  var formulario = new FormData(document.getElementById("actualizar"));
                  $.ajax({
                    url: "includes/actualizarStatusPedido.php",
                    type: "POST",
                    data: formulario,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success: function(response){
                      $("#respuesta").append(response);
                    }
                  });
                });
              </script>
              <div id="respuesta"></div>
            </td>
          </tr>
          <tr><td colspan="4">&nbsp;</td></tr>
          <tr>
            <td colspan="4" class="segundo" style="font-size:18px;font-weight:bold;">Detalles del Pedido</td>
          </tr>
          <tr>

            <td class="primero">Cantidad</td>
            <td class="primero">Producto</td>
            <td class="primero">Precio Unitario</td>
            <td class="primero">Subtotal</td>
          </tr>
          <?php
          $total=0;
          while($mostrado=mysqli_fetch_array($reMostrar,MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td class='segundo'>".$mostrado['cantidadProducto_pedido']."</td>";
            echo "<td class='segundo' align='left'>".$mostrado['producto_pedido']."</td>";
            echo "<td class='segundo'>".$mostrado['totalprecio_pedido']/$mostrado['cantidadProducto_pedido']." Bs.F</td>";
            echo "<td class='segundo'>".$mostrado['totalprecio_pedido']." Bs.F</td>";
            echo "</tr>";
            $total=$total+$mostrado['totalprecio_pedido'];
          }
          echo "<tr><td class='tercero' colspan='4'>Total:&nbsp;".$total." Bs.F</td></tr>";
          echo "<tr>
            <td colspan='4'>
              <form class='form' method='post' action='includes/reportePedidosUsuario.php' target='new'>
                <input type='hidden' name='codOrdenCompra' value='".$_POST['criterio']."'/>
                <input type='hidden' name='codCompra' value='".$codigoVenta."'/>
                <input type='hidden' name='fechaCompra' value='".$_POST['date_pedido']."'/>
                <div class='groupButton'>
                  <button type='button' onclick='javascript:history.back()'>Ir Atr&aacute;s</button>
                </div>
              </form>
            </td>
          </tr>";
          echo "</table>";
        }else{
          echo "<h1>Pedidos Realizados Hasta el momento</h1>";
          $mostrarCompras="SELECT DISTINCT
          tbl_ordenpedidos.id_ordenPedido,
          tbl_ordenpedidos.codigo_pedido,
          tbl_ordenpedidos.status_pedido,
          tbl_pedidos.usuario_pedido,
          tbl_pedidos.date_pedido
          FROM
          tbl_ordenpedidos
          INNER JOIN tbl_pedidos ON tbl_ordenpedidos.codigo_pedido = tbl_pedidos.codigo_pedido";
          $reMostrarCompras=mysqli_query($con,$mostrarCompras);
          if(mysqli_num_rows($reMostrarCompras)==0){
            echo "<table>
              <tr><td align='center'><h2>No Hay Compras Hasta el Momento</h2></td></tr>
              <tr><td align='justify'>
                <p>Usted no ha pedido nada con nosotros hasta el momento. Para hacerlo debe hacer click la opci&oacute;n del menu \"Productos\" y a&ntilde;adir productos al carrito.</p>
              </td></tr>
            </table>";
          }else{
            echo "<table align='center'>
              <tr>
                <td class='primero'>Codigo de la Orden del Pedido</td>
                <td class='primero'>Codigo de la Transacci&oacute;n</td>
                <td class='primero'>Status del Pedido</td>
                <td class='primero'>Usuario del Pedido</td>
                <td class='primero'>Detalles del Pedido</td>
              </tr>";
              while($comprasMostradas=mysqli_fetch_array($reMostrarCompras,MYSQLI_ASSOC)){
                $momentoCompra=explode(" ",$comprasMostradas['date_pedido']);
                $momentoCompra[0]=date('d-m-Y',strtotime($momentoCompra[0]));
                echo "<tr><td class='segundo'>".$comprasMostradas['id_ordenPedido']."</td>";
                echo "<td class='segundo'>".$comprasMostradas['codigo_pedido']."</td>";
                echo "<td class='segundo'>".$comprasMostradas['status_pedido']."</td>";
                echo "<td class='segundo'>".$comprasMostradas['usuario_pedido']."</td>";
                echo "<td class='segundo'>
                  <form method='post'>
                    <input type='hidden' name='criterio' value='".$comprasMostradas['id_ordenPedido']."'/>
                    <input type='hidden' name='date_pedido' value='".$momentoCompra[0]."'/>
                    <input type='hidden' name='status_pedido' value='".$comprasMostradas['status_pedido']."'/>
                    <input type='hidden' name='usuario_pedido' value='".$comprasMostradas['usuario_pedido']."'/>
                    <div class='groupButton'>
                      <button type='submit' name='btnBuscar'>Ver M&aacute;s</button>
                    </div>
                  </form>
                </td></tr>";
                }
                echo "</table>";
              }
            }
            ?>
  </div>
</div>
