<div class="row center-xs">
  <div class="col-xs-12">
    <h1>Productos Destacados</h1>
  </div>
  <div class="col-xs-10">
    <div id="owl-carrousel">
      <?php
        require_once('includes/conexbd.php');
        $con = conexionBD('localhost', 'root', '', 'shalomimportca');
        $items = "SELECT * FROM tbl_productos WHERE destacado_producto='1' AND cantidad_producto > 0";
        $itemsExecute=mysqli_query($con, $items);
        while($itemsResult=mysqli_fetch_assoc($itemsExecute)){
          ?>
            <div class="item  row  middle-xs">
              <div class="col-xs-6">
                <table border="0" style="text-align:justify;border-spacing: 10px;border-collapse: separate;">
                  <tr>
                    <td style="font-weight:bold;">Nombre:</td>
                    <td><?php echo $itemsResult['nombre_producto']?></td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Descripci&oacute;n:</td>
                    <td><?php echo $itemsResult['descripcion_producto']?></td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Precio:</td>
                    <td><?php echo $itemsResult['precio_producto']?> Bs.F</td>
                  </tr>
                </table>
              </div>
              <div class="col-xs-6">
                <img src="includes/imagenProducto.php?id=<?php echo $itemsResult['id_producto']?>" alt="No se Encontro la Imagen" />
              </div>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-carrousel").owlCarousel({
        autoPlay: true,
        items : 1,
    });
  });
</script>
